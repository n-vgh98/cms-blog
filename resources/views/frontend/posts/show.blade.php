@extends('frontend.layouts.master')
@section('head')
    <meta name="description" content="{{$post->meta_description}}">
    <meta name="keywords" content="{{$post->meta_keywords}}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@endsection

@section('navigation')
    @include('partials.navigation',['categories'=>$categories])
@endsection

@section('content')
    @if(session()->has('add_comment'))
        <div class="alert alert-success mt-2">
            <div>{{session ('add_comment')}}</div>
        </div>
    @endif
    <!-- Title -->

        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by
            <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{$post->created_at}}</p>

        <hr>

        <!-- Preview Image -->
        <img src="{{$post->photo ? $post->photo->path : "http://www.placehold.it/900x300"}}" class="img-fluid rounded" width="900*300">

        <hr>

        <!-- Post Content -->
        <div>{{$post->description}}</div>

        <hr>
    <!-- Comments Form -->
    @include('partials.errors')
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            {!! Form::open(['method'=>'post' , 'route'=>['frontend.comments.store', $post->id]]) !!}
            <div class="form-group">
                {!! Form::label('description','Comment:') !!}
                {!! Form::textarea('description',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('save',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Single Comment -->
   @include('partials.comments',['comments'=>$post->comments , 'post'=>$post])

@endsection
@section('sidebar')
    @include('partials.sidebar',['categories'=>$categories])
@endsection