@extends('layouts.global')

@section('title')
    Create Category
@endsection


@section('content')

    <div class="col-md-8">

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        TODO : From create category

        <form action="{{route('categories.store')}}" method="POST" class="bg-white shadow-sm p-3" enctype="multipart/form-data">
        @csrf

            <label for="">Category Name</label>
            <input value="{{old('name')}}" type="text" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" name="name">
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br>

            <label for="">Category Image</label>
            <input type="file" name="image" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}">
            <div class="invalid-feedback">
                {{$errors->first('image')}}
            </div>
            <br>

            <input type="submit" value="Save" class="btn btn-primary">

        </form>

    </div>

@endsection
