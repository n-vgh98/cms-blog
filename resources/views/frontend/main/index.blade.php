@extends('frontend.layouts.master')

@section('head')
    <meta name="description" content="Nursa Blog">
    <meta name="keywords" content="learninf Blog By Nursa Team">
@endsection
@section('navigation')
@include('partials.navigation',['categories'=>$categories])
@endsection

@section('content')
    <!-- Title -->
    <h3 class="mt-4">Latest Posts</h3>
    @foreach($posts as $post)
        <h1 class="mt-4"><a href="{{route('frontend.posts.show', $post->slug)}}">{{$post->title}}</a></h1>

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
        <div>{{str_limit($post->description,120)}}</div>
        <div class="col-md-12 text-right">
            <a class="btn btn-primary" href="{{route('frontend.posts.show',$post->slug)}}" >Read More</a>
        </div>
        <hr>
        <div class="col-md-12 pagination justify-content-center">{{$posts->links()}}</div>
    @endforeach
@endsection
@section('sidebar')
    @include('partials.sidebar',['categories'=>$categories])
@endsection