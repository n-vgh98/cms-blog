@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Contents List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Dashboard v1</li>
                 </ol>
                 </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
        @if(session()->has('add_post'))
        <div class="alert alert-success">
            <div>{{session ('add_post')}}</div>
        </div>
        @endif
        @if(session()->has('delete_post'))
            <div class="alert alert-danger">
                <div>{{session ('delete_post')}}</div>
            </div>
        @endif
        @if(session()->has('update_post'))
            <div class="alert alert-success">
                <div>{{session ('update_post')}}</div>
            </div>
        @endif
        <table class="table bg-white">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Title</th>
                <th scope="col">User name</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">status</th>
                <th scope="col">Created_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <td><img src="{{$post->photo ? $post->photo->path : "http://www.placehold.it/400"}}" class="img-fluid" width="80"></td>
                <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->user->name}}</td>
                        <td>{{Str::limit($post->description),20}}</td>
                        <td>{{$post->category->title}}</td>
                    @if($post->status == 0)
                        <td><span class="badge badge-pill badge-danger">Inactive</span></td>
                        @else
                        <td><span class="badge badge-pill badge-success">Active</span></td>
                    @endif
                <td>{{$post->created_at}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    <div class="col-md-12 pagination justify-content-center">{{$posts->links()}}</div>

@endsection