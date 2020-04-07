@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Comments Editing</h1>
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
        <div class="row bg-white">
            <div class="col-md-6 offset-3 bg-white">
            @include('partials.errors')
            {!! Form::model($comment,['method'=>'PATCH' , 'action'=>['Admin\CommentController@update',$comment->id]]) !!}
                <div class="form-group">
                    {!! Form::label('description','Description:') !!}
                    {!! Form::textarea('description',$comment->description,['class'=>'form-control']) !!}
                </div>
            <div class="form-group">
                {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE' , 'action'=>['Admin\CommentController@destroy',$comment->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}
            </div>
      </div>
@endsection