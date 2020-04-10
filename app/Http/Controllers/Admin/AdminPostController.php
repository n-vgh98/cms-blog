<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with('photo','user','category')->orderBy('created_at','desc')
            ->paginate(5);
        return view('admin.posts.index',compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::pluck('title','id');
        return view('admin.posts.create',compact(['category']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $post= new Post();

        if($file = $request->file('first_photo')){
            $name= time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo=new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path= $name;
            $photo->user_id =Auth::id();
            $photo->save();
            $post->photo_id = $photo->id;
        }
        $post->title = $request->input('title');

        if($request->input('slug')){
            $post->slug= make_slug($request->input('slug'));
        }else{
            $post->slug = make_slug($request->input('title'));
        }
        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        $post->user_id = Auth::id();
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->status = $request->input('status');
        $post->save();

        session::flash('add_post','New post successfully added');
        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::with('category')->where('id',$id)->first();
        $category=Category::pluck('title','id');
        return view('admin.posts.edit',compact(['post','category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        $post=Post::findOrFail($id);
        if ($file= $request->file('first_photo')){
            $name= time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo= new Photo();
            $photo->name= $file->getClientOriginalName();
            $photo->path= $name;
            $photo->user_id=Auth::id();
            $photo->save();
            $post->photo_id=$photo->id;
        }
        $post->title=$request->input('title');
        if($request->input('slug')){
            $post->slug=make_slug($request->input('slug'));
        }else{
            $post->slug=make_slug($request->input('title'));
        }
        $post->description=$request->input('description');
        $post->category_id = $request->input('category');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->status = $request->input('status');
        $post->save();

        session::flash('update_post','Content editing done successfully');
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $photo=Photo::findOrFail($post->photo_id);
        unlink(public_path() . $post->photo->path);
        $photo->delete();
        $post->delete();
        session::flash('delete_post','Post deleted successfully');
        return redirect('admin/posts');
    }
}
