@extends('admin.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{asset('admin/dist/css/dropzone.min.css')}}">
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Upload Media</h1>
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
        {!! Form::open(['method'=>'post' , 'action'=>'Admin\AdminPhotoController@store','class'=>'dropzone']) !!}
    </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('admin/dist/js/dropzone.min.js')}}"></script>
@endsection