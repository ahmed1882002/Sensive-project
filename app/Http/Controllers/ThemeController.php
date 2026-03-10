<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(2);
        return view('theme.index', compact('blogs'));
    }
    public function contact()
    {
        return view('theme.contact');
    }
    public function category()
    {
        return view('theme.category');
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('theme.register');
    }
    public function SingleBloge()
    {
        return view('theme.single-blog');
    }
}
