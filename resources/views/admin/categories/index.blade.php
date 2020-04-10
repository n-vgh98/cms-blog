@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                  </ol>
                 </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
        @if(session()->has('add_category'))
        <div class="alert alert-success">
            <div>{{session ('add_category')}}</div>
        </div>
        @endif
        @if(session()->has('delete_category'))
            <div class="alert alert-danger">
                <div>{{session ('delete_category')}}</div>
            </div>
        @endif
        @if(session()->has('update_category'))
            <div class="alert alert-success">
                <div>{{session ('update_category')}}</div>
            </div>
        @endif
        <table class="table bg-white">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Created_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit', $category->id)}}">{{$category->title}}</a></td>
                <td>{{$category->created_at}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    <div class="col-md-12 pagination justify-content-center">{{$categories->links()}}</div>
@endsection