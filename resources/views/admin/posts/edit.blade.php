@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Content Editing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
        <div class="row bg-white">
            <div class="col-md-3">
                <img src="{{$post->photo ? $post->photo->path : "http://www.placehold.it/400"}}" class="img-fluid">
            </div>
            <div class="col-md-9 bg-white">
            @include('partials.errors')
            {!! Form::model($post,['method'=>'PATCH' , 'action'=>['Admin\AdminPostController@update',$post->id],'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('title','Title:') !!}
                    {!! Form::text('title', $post->title , ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug','Alias:') !!}
                    {!! Form::text('slug', $post->slug , ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category','Grouping:') !!}
                    {!! Form::select('category',$category,$post->category->id , ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description','description:') !!}
                    {!! Form::textarea('description',$post->description,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('first_photo','Content Image:') !!}
                    {!! Form::file('first_photo',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status','Status:') !!}
                    {!! Form::select('status', [0=>'Inactive', 1=>'Active'] ,$post->status, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_description','meta_description:') !!}
                    {!! Form::textarea('meta_description',$post->meta_description,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_keywords','meta_keywords:') !!}
                    {!! Form::textarea('meta_keywords',$post->meta_keywords,['class'=>'form-control']) !!}
                </div>
            <div class="form-group">
                {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE' , 'action'=>['Admin\AdminPostController@destroy',$post->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}
            </div>
      </div>
@endsection