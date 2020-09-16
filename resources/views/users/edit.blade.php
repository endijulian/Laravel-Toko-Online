
@extends('layouts.global')

@section('title')
    Edit User
@endsection

@section('content')

<div class="col-md-8">

<h2>Edit User</h2>
{{--  User yang akan di edit {{$user->email}}  --}}

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form action="{{route('users.update', [$user->id])}}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
            @csrf

            <input type="hidden" value="PUT" name="_method">

            <label for="name">Name</label>
            <input value="{{old('name') ? old('name') : $user->name}}" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" type="text" name="name" id="name" placeholder="full name">
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br>

            <label for="username">Username</label>
            <input value="{{$user->username}}" disabled class="form-control" type="text" username="username" id="username" placeholder="full username">
            <div class="invalid-feedback">
                {{$errors->first('username')}}
            </div>
            <br>

            <label for=""> Status</label>
            <br>
            <input class="form-control" {{$user->status == "ACTIVE" ? 'checked' : ""}} value="ACTIVE" type="radio" id="active" name="status">
            <label for="active">ACTIVE</label>

            <input class="form-control" {{$user->status == "INACTIVE" ? 'checked' : ""}} value="INACTIVE" type="radio" id="inactive" name="status">
            <label for="inactive">INACTIVE</label>
            <br><br>

            <label for="">Roles</label>
            <br>
            <input class="form-control {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="ADMIN" value="ADMIN">
            <label for="ADMIN">Administrator</label>

            <input class="form-control {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="STAFF" value="STAFF">
            <label for="STAFF">Staff</label>

            <input class="form-control {{$errors->first('roles') ? "is-invalid" : ""}}" type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="CUSTOMER" value="CUSTOMER">
            <label for="CUSTOMER">Customer</label>
            <div class="invalid-feedback">
                {{$errors->first('roles')}}
            </div>
            <br>

            <br>
            <label for="phone"> Phone Number</label>
            <input value="{{old('phone') ? old('phone') : $user->phone}}" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}" type="text" name="phone">
            <div class="invalid-feedback">
                {{$errors->first('phone')}}
            </div>

            <br>
            <label for="address">Address</label>
            <textarea class="form-control {{$errors->first('address') ? "is-invalid" : ""}}" name="address" id="address"> {{old('address') ? old('address') : $user->address}} </textarea>
            <div class="invalid-feedback">
                {{$errors->first('address')}}
            </div>

            <br>
            <label for="avatar">Avatar Image</label>
            <br>
            @if ($user->avatar)
                <img src="{{asset('storage/'.$user->avatar)}}" width="120px">
                <br>
            @else
                No Avatar
            @endif
            <br>
            <input class="form-control" type="file" name="avatar" id="avatar">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
            <hr class="my-3">

            <label for="email">Email</label>
            <input class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" type="text" name="email" id="email" value="{{$user->email}}" disabled placeholder="user@mail.com">
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>

            <br>
            <input class="btn btn-primary" type="submit" value="Save">

        </form>
    </div>
@endsection
