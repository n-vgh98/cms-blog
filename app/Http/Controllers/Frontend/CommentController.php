<?php

namespace App\Http\Controllers\Frontend;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

class CommentController extends Controller
{
    public function store(Request $request,$postId)
    {
        $post=Post::findOrFail($postId);
        if ($post){
            $comment= new Comment();
            $comment->description = $request->input('description');
            $comment->post_id= $post->id;
            $comment->status=0;
            $comment->user_id = Auth::id();
            $comment->save();
        }
        session::flash('add_comment','comment add successfully');
        return back();
    }

    public function reply(Request $request)
    {
        $postId= $request->input('post_id');
        $parentId= $request->input('parent_id');
        if($postId){
            $comment = new Comment();
            $comment->description = $request->input('description');
            $comment->parent_id = $parentId;
            $comment->post_id = $postId;
            $comment->status =0;
            $comment->user_id = Auth::id();
            $comment->save();
        }
        session::flash('add_comment','comment add successfully');
        return back();

    }
}
