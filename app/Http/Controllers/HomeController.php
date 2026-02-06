<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Home',
            'post' => Post::latest()->paginate(8)->withQueryString(),
            'slide' => Post::latest()->take(4)->get(),
            'categories' => Category::withCount('post')->get(),
            'recent_post' => Post::latest()->take(5)->get(),
        ]);
    }

    public function archive()
    {
        return view('archive', [
            'title' => 'Archive -> ' . request('search') ,
            'categories' => Category::withCount('post')->get(),
            'post' => Post::latest()->filter(request(['search']))->paginate(8)->withQueryString(),
            'recent_post' => Post::latest()->take(5)->get(),
        ]);
    }
}
