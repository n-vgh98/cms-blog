<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

class CommentController extends Controller
{
    public function index()
    {
        $comments=Comment::with('post')
            ->orderBy('created_at','desc')
            ->paginate(5);
        return view('admin.comments.index',compact(['comments']));
    }

    public function actions(Request $request,$id)
    {
        if($request->has('action')){
            if ($request->input('action') == 'approved'){
                $comment =Comment::findOrFail($id);
                $comment->status =1;
                $comment->save();
                session::flash('approved_comment','Comment successfully added');
            }else{
                $comment= Comment::findOrFail($id);
                $comment->status=0;
                $comment->save();
                session::flash('reject_comment','No comment added');
            }
        }
        return redirect('admin/comments');
    }

    public function edit($id)
    {
        $comment=Comment::findOrFail($id);
        return view('admin.comments.edit',compact(['comment']));
    }

    public function update(Request $request,$id)
    {
        $comment=Comment::findOrFail($id);
        $comment->description = $request->input('description');
        $comment->save();
        session::flash('update_comment','Comment editing done successfully');
        return redirect('admin/comments');
    }

    public function destroy($id)
    {
        $comment=Comment::findOrFail($id);
        $comment->delete();
        session::flash('delete_comment','Comment deleting done successfully');
        return redirect('admin/comments');
    }
}
