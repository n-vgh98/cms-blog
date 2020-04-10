@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories Editing</h1>
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
            <div class="col-md-6 offset-3 bg-white">
            @include('partials.errors')
            {!! Form::model($category,['method'=>'PATCH' , 'action'=>['Admin\AdminCategoryController@update',$category->id]]) !!}
                <div class="form-group">
                    {!! Form::label('title','Title:') !!}
                    {!! Form::text('title', $category->title , ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug','Alias:') !!}
                    {!! Form::text('slug', $category->slug , ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_description','meta_description:') !!}
                    {!! Form::textarea('meta_description',$category->meta_description,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_keywords','meta_keywords:') !!}
                    {!! Form::textarea('meta_keywords',$category->meta_keywords,['class'=>'form-control']) !!}
                </div>
            <div class="form-group">
                {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE' , 'action'=>['Admin\AdminCategoryController@destroy',$category->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}
            </div>
      </div>
@endsection