<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(4);
        return view('theme.index', compact('blogs'));
    }
    public function contact()
    {
        return view('theme.contact');
    }
    public function category(Category $category)
    {
        $blogs = $category->blogs()->paginate(4);
        return view('theme.category', compact('category', 'blogs'));
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('theme.register');
    }
    public function SingleBloge(Blog $blog)
    {
        $blog->load('comments.user');
        return view('theme.single-blog', compact('blog'));
    }
}
