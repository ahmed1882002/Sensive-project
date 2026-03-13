<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $blog->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
}
