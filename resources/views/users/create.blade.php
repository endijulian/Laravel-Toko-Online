@extends('layouts.global')

@section('title')
    Create User
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8">

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.store')}}" method="POST">
        @csrf

        <label for="name">Name</label>
        <input value="{{old('name')}}" type="text" id="name" name="name" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Full Name">
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
        <br>

        <label for="username">Username</label>
        <input value="{{old('username')}}" type="text" id="username" name="username" class="form-control {{$errors->first('username') ? "is-invalid" : ""}}" placeholder="Username">
        <div class="invalid-feedback">
            {{$errors->first('username')}}
        </div>
        <br>

        <label for="">Roles</label>
        <br>
        <input type="checkbox" id="ADMIN" name="roles[]" value="ADMIN" class="form-control {{$errors->first('roles') ? "is-invalid" : ""}}">
        <label for="ADMIN">Administrator</label>

        <input type="checkbox" name="roles[]" id="STAFF" value="STAFF" class="form-control {{$errors->first('roles') ? "is-invalid" : ""}}">
        <label for="STAFF">Staff</label>

        <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER" class="form-control {{$errors->first('roles') ? "is-invalid" : ""}}">
        <label for="CUSTOMER">Customer</label>

        <div class="invalid-feedback">
            {{$errors->first('roles')}}
        </div>
        <br>

        <br>
        <label for="phone">Phone Number</label>
        <br>
        <input type="text" name="phone" class="form-control" value="{{old('phone')}}" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}">
        <div class="invalid-feedback">
            {{$errors->first('phone')}}
        </div>
        <br>

        <label for="address">Adress</label>
        <textarea name="address" id="address" class="form-control {{$errors->first('address') ? "is-invalid" : ""}}" cols="30" rows="10"> {{old('address')}} </textarea>
        <div class="invalid-feedback">
            {{$errors->first('address')}}
        </div>
        <br>

        <label for="avatar">Avatar</label>
        <br>
        <input type="file" name="avatar" id="avatar" class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}">
        <div class="invalid-feedback">
            {{$errors->first('avatar')}}
        </div>

        <hr class="my-3">

        <label for="email">Email</label>
        <input value="{{old('email')}}" type="text" name="email" id="email" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" placheholder="user@mail.com">
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control {{$errors->first('password') ? "is-invalid" : ""}}" placeholder="password">
        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>
        <br>

        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="password-confirmation" class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}}" placeholder="Password Confirmation">
        <div class="invalid-feedback">
            {{$errors->first('password_confirmation')}}
        </div>
        <br>

        <input type="submit" value="Save" class="btn btn-primary">
    </form>

        </div>
    </div>
</div>

@endsection
