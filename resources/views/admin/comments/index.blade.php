@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Comments List</h1>
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
        @if(session()->has('delete_comment'))
            <div class="alert alert-danger">
                <div>{{session ('delete_comment')}}</div>
            </div>
        @endif
        @if(session()->has('update_comment'))
            <div class="alert alert-success">
                <div>{{session ('update_comment')}}</div>
            </div>
        @endif
        <table class="table bg-white">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Comments</th>
                <th scope="col">Post</th>
                <th scope="col">Created_at</th>
                <th scope="col">Ststus</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td><a href="{{route('comments.edit', $comment->id)}}">{{$comment->description}}</a></td>
                <td>{{$comment->post->title}}</td>
                <td>{{$comment->created_at}}</td>
                @if($comment->status == 0)
                    <td><span class="badge badge-pill badge-danger">Inactive</span></td>
                @else
                    <td><span class="badge badge-pill badge-success">Active</span></td>
                @endif
                @if($comment->status == 0)
                <td>
                    {!! Form::open(['method'=>'post' , 'route'=>['comments.actions',$comment->id]]) !!}
                    <div class="form-group">
                        {!! Form::hidden('action','approved') !!}
                        {!! Form::submit('OK', ['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                    @else
                    <td>
                    {!! Form::open(['method'=>'post' , 'route'=>['comments.actions',$comment->id]]) !!}
                    <div class="form-group">
                        {!! Form::hidden('action','reject') !!}
                        {!! Form::submit('Not Ok', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                    </td>
                    @endif

            </tr>
            @endforeach
            </tbody>
        </table>
    <div class="col-md-12 pagination justify-content-center">{{$comments->links()}}</div>
@endsection