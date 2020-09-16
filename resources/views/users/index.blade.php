@extends('layouts.global')

@section('title') User List

@endsection

@section('content')
    <div class="col-md-12">

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <h3>Daftar user disini</h3>

        {{--  <div class="row">
            <div class="col-md-6">
                <form action="{{route('users.index')}}">
                    <div class="input-group mb-3">
                        <input value="{{Request::get('keyword')}}" name="keyword" type="text" class="form-control col-md-10" placeholder="Filter berdasarkan email">

                        <div class="input-group-append">
                            <input type="submit" value="filter" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>  --}}

        <form action="{{route('users.index')}}">
            <div class="row">

                <div class="col-md-6">
                    <input class="form-control" type="text" value="{{Request::get('keyword')}}" name="keyword" placeholder="Masukan email untuk filter">
                </div>

                <div class="col-md-6">
                    <input {{Request::get('status') == 'ACTIVE' ? 'checked' : ''}} type="radio" class="form-control" value="ACTIVE" name="status" id="active">
                    <label for="active">Active</label>

                    <input {{Request::get('status') == 'INACTIVE' ? 'checked' : ''}} type="radio" class="form-control" value="INACTIVE" name="status" id="inactive">
                    <label for="inactive">Inactive</label>

                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </div>
        </form>


        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{route('users.create')}}" class="btn btn-primary"> Create User</a>
            </div>
        </div>
        <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><b>Name</b></th>
                <th><b>Username</b></th>
                <th><b>Email</b></th>
                <th><b>Avatar</b></th>
                <th><b>Status</b></th>
                <th><b>Action</b></th>
            </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}} </td>
            <td>
                @if($user->avatar)
                    <img src="{{asset('storage/'.$user->avatar)}}" width="70px" alt="">
                @else
                    N/A
                @endif
            </td>
            <td>
                @if($user->status == "ACTIVE")
                    <span class="badge badge-success">{{$user->status}}</span>
                @else
                    <span class="badge badge-danger">{{$user->status}}</span>
                @endif
            </td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{route('users.show', [$user->id])}}">Detail</a>
                <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', [$user->id])}}">Edit</a>
                {{--  <a class="btn btn-info text-white btn-sm" href="{{route('users.destroy', [$user->id])}}">Edit</a>  --}}
                <form onsubmit="return confirm('Delete this user permanently ?')" class="d-inline" action="{{route('users.destroy', [$user->id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="Delete">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
            <tfoot>
                <tr>
                    <td colspan=10>
                        {{$users->appends(Request::all())->links()}}
                    </td>
                </tr>
            </tfoot>
    </table>
</div>

@endsection
