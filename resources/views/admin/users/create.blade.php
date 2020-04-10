@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Create new user</h1>
                </div><!-- /.col -->
                 <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                      </ol>
                  </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="bg-white">
    <div class="col-md-6 offset-3 bg-white">
        @include('partials.errors')
        {!! Form::open(['method'=>'post' , 'action'=>'Admin\AdminUserController@store']) !!}
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
                {!! Form::select('status', [0=>'Inactive', 1=>'Active'] ,0, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password' , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Confirm Password:') !!}
                {!! Form::password('password' , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('save',['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

    </section>
@endsection


