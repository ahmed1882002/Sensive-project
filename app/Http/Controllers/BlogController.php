<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        // throw new \Exception('Not implemented');
        $this->middleware('auth')->only(['create']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('user_id', Auth::user()->id)->paginate(5);
        // $blogs = auth()->user()->blogs()->latest()->paginate(10);
        return view('my-blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('theme.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required|exists:categories,id'
            ],
            [],
            [
                'category_id' => 'category'
            ]
        );
        //File Upload & Storage Handling"
        $image = $request->image;
        $newInageName = time() . '-' . $image->getClientOriginalName();
        $image->storeAs('blogs', $newInageName, 'public');
        $data['image'] = $newInageName;
        $data['user_id'] = Auth::id();
        Blog::create($data);
        return redirect()->back()->with('success_store_blog', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load('comments.user');
        return view('theme.single-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            # code...
            // abort_if($blog->user_id !== auth()->id(), 403);
            $categories = Category::all();
            return view('my-blogs.edit', compact('blog', 'categories'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            # code...
            // abort_if($blog->user_id !== auth()->id(), 403);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('image')) {
                if ($blog->image && Storage::disk('public')->exists('blogs/' . $blog->image)) {
                    Storage::disk('public')->delete('blogs/' . $blog->image);
                }
                $file = $request->file('image');
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->storeAs('blogs', $filename, 'public');
                $validated['image'] = $filename;
            }

            $blog->update($validated);

            return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        abort_if($blog->user_id !== auth()->id(), 403);

        if ($blog->image && Storage::disk('public')->exists('blogs/' . $blog->image)) {
            Storage::disk('public')->delete('blogs/' . $blog->image);
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
