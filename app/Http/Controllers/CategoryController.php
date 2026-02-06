<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->post()->with('category','user')->paginate(4)->withQueryString();
        return view('category', [
            'title' => $category->name,
            'post' => $posts,
            // 'post' => $category->post->load('category', 'user')->paginate(8)->withQueryString(),
            'category' => $category->name,
            // 'categories' => Category::all(),
            'categories' => Category::withCount('post')->get(),
            'recent_post' => Post::latest()->take(5)->get(),
        ]);
    }
}
