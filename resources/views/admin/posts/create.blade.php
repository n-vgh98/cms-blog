@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Create new Content</h1>
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
    <section class="bg-white">
    <div class="col-md-10 offset-1 ">
        @include('partials.errors')
        {!! Form::open(['method'=>'post' , 'action'=>'Admin\AdminPostController@store','files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title','Title:') !!}
                {!! Form::text('title', null , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug','Alias:') !!}
                {!! Form::text('slug', null , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category','Grouping:') !!}
                {!! Form::select('category',$category,null , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description','description:') !!}
                {!! Form::textarea('description',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('first_photo','Content Image:') !!}
                {!! Form::file('first_photo',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status','Status:') !!}
                {!! Form::select('status', [0=>'Inactive', 1=>'Active'] ,0, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_description','meta_description:') !!}
                {!! Form::textarea('meta_description',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_keywords','meta_keywords:') !!}
                {!! Form::textarea('meta_keywords',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('save',['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
    </section>
@endsection