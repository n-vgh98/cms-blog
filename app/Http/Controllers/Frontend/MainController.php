<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        $posts=Post::with('user','category','photo')
            ->where('status','1')
            ->orderBy('created_at','desc')
            ->paginate(5);
        $categories= Category::all();
        return view('frontend.main.index', compact(['posts','categories']));
    }
}
