@extends('layouts.global')

@section('title')
    Category List
@endsection

@section('content')

        {{-- @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif --}}

        @if(session('status'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        {{session('status')}}
                    </div>
                </div>
            </div>
        @endif

        <h3>Category list</h3>
        <div class="row">
                <div class="col-md-6">
                    <form action="{{route('categories.index')}}">
                        <div class="input-group">
                            <input type="text" value="{{Request::get('name')}}" class="form-control" name="name" placeholder="Filter name category">

                            <div class="input-group append col-sm-2">
                                <input type="submit" class="btn btn-primary" value="Filter">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('categories.index')}}">Published</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('categories.trash')}}">Trash</a>
                            </li>
                        </ul>
                </div>

        </div>
        <hr class="my-3">

        <div class="row">
                <div class="col-md-12 text-right mb-2">
                    <a class="btn btn-primary" href="{{route('categories.create')}}">Create Category</a>
                </div>
        </div>
<div class="row">
    <div class="col-md-12">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><b>Name</b></th>
                    <th><b>Slug</b></th>
                    <th><b>Image</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        @if($category->image)
                            <img src="{{asset('storage/'. $category->image)}}" width="48px">
                        @else
                            NoImage
                        @endif
                    </td>
                    <td>
                        <a href="{{route('categories.edit', [$category->id])}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{route('categories.show', [$category->id])}}" class="btn btn-sm btn-primary">Detail</a>

                        <form action="{{route('categories.destroy', [$category->id])}}" method="POST" class="d-inline" onsubmit="return confirm('Move category to trash ?')">
                            @csrf

                            <input type="hidden" value="DELETE" name="_method">
                            <input type="submit" value="Trash" class="btn btn-danger btn-sm">
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">
                        {{$categories->appends(Request::all())->links()}}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


@endsection
