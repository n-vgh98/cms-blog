<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $postsCount=Post::count();
        $categoriesCount=Category::count();
        $photosCount=Photo::count();
        $usersCount=User::count();
        $posts=Post::orderby('created_at','desc')->limit(5)->get();
        $users=User::orderby('created_at','desc')->limit(5)->get();
        return view('admin.dashboard.index',compact(['postsCount','categoriesCount','photosCount','usersCount','posts','users']));
    }
}
