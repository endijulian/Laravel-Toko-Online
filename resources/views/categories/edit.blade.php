@extends('layouts.global')

@section('title')
    Edit Category
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <div class="col-md-8">
        <form action="{{route('categories.update', [$category->id])}}" enctype="multipart/form-data" class="bg-white shadow-sm p-3" method="POST">
            @csrf

            <input type="hidden" value="PUT" name="_method">

            <label for="">Category name</label>
            <br>
            <input type="text" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{old('name') ? old('name') : $category->name}}" name="name">
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br><br>

            <label for="">Category slug</label>
            <br>
            <input type="text" class="form-control {{$errors->first('slug')}}" value="{{ old('slug') ? old('slug') : $category->slug}}" name="slug">
            <div class="invalid-feedback">
                {{$errors->first('slug')}}
            </div>
            <br><br>

            @if ($category->image)
                <span>Curent Image</span>
                <img src="{{asset('storage/'. $category->image)}}" alt="" width="120px">
                <br><br>
            @endif
            <input type="file" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}" name="image">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            <div class="invalid-feedback">
                {{$errors->first('image')}}
            </div>
            <br><br>

            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>

@endsection
