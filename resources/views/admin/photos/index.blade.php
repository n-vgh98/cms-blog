@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Media List</h1>
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
        @if(session()->has('delete_photo'))
            <div class="alert alert-danger">
                <div>{{session ('delete_photo')}}</div>
            </div>
        @endif
        <table class="table bg-white">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Photo</th>
                <th scope="col">User Name</th>
                <th scope="col">Created_at</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img src="{{$photo->path}}" class="img-fluid" width="80"></td>
                <td>{{$photo->user->name}}</td>
                <td>{{$photo->created_at}}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE' , 'action'=>['Admin\AdminPhotoController@destroy',$photo->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    <div class="col-md-12 pagination justify-content-center">{{$photos->links()}}</div>

@endsection