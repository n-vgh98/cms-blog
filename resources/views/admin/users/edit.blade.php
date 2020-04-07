@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Editing {{$user->name}}</h1>
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
            <div class="col-md-3">
                <img src="{{$user->photo ? $user->photo->path : "http://www.placehold.it/400"}}" class="img-fluid">
            </div>
            <div class="col-md-9 bg-white">
            @include('partials.errors')
            {!! Form::model($user,['method'=>'PATCH' , 'action'=>['Admin\AdminUserController@update',$user->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title','Name and Family:') !!}
                {!! Form::text('name', null , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::text('email', null , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('roles','Role:') !!}
                {!! Form::select('roles[]',$roles,null , ['multiple'=>'multiple','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo','Profile picture:') !!}
                {!! Form::file('photo',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status','Status:') !!}
                {!! Form::select('status', [0=>'Inactive', 1=>'Active'] ,null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password' , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE' , 'action'=>['Admin\AdminUserController@destroy',$user->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}
            </div>
      </div>
@endsection