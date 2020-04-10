@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Members List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                 </ol>
                 </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    @if(session()->has('delete_user'))
        <div class="alert alert-danger">
            <div>{{session ('delete_user')}}</div>
        </div>
    @endif
    @if(session()->has('add_user'))
        <div class="alert alert-success">
            <div>{{session ('add_user')}}</div>
        </div>
    @endif
    @if(session()->has('edit_user'))
        <div class="alert alert-success">
            <div>{{session ('edit_user')}}</div>
        </div>
    @endif
        <table class="table bg-white">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Created_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>

                <td><img src="{{$user->photo ? $user->photo->path : "http://www.placehold.it/400"}}" class="img-fluid" width="80"></td>
                <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <ul style="list-style-type: none">
                                    <li>{{$role->name}}</li>
                                </ul>
                            @endforeach
                        </td>
                    @if($user->status == 0)
                        <td><span class="badge badge-pill badge-danger">Inactive</span></td>
                        @else
                        <td><span class="badge badge-pill badge-success">Active</span></td>
                    @endif
                <td>{{$user->created_at}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    <div class="col-md-12 pagination justify-content-center">{{$users->links()}}</div>

@endsection