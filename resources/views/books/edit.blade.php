@extends('layouts.global')

@section('title')
    Edit Book
@endsection

@section('content')
    <div class="row">

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <div class="col-md-8">
            <form action="{{route('books.update', [$book->id])}}" method="POST" class="p-3 shadow-sm bg-white" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="_method" value="PUT">

                <label for="title">Title</label>
                <br>
                <input type="text" name="title" id="title" value="{{$book->title}}" class="form-control">
                <br>

                <label for="cover">Cover</label>
                <br>
                <small class="text-muted">Current Cover</small>
                <br>
                @if($book->cover)
                    <img src="{{asset('storage/'. $book->cover)}}" width="96px" alt="">
                @endif
                <br><br>
                <input type="file" name="cover" class="form-control">
                <br>
                <small class="text-muted">Kosongkan jika tidak ingin di ubah</small>
                <br>

                <label for="slug">Slug</label>
                <br>
                <input type="text" name="slug" id="slug" value="{{$book->slug}}" class="form-control">
                <br>

                <label for="description">Description</label>
                <br>
                <input type="text" name="description" id="description" value="{{$book->description}}" class="form-control">
                <br>

                <label for="categories">Categories</label>
                <br>
                <select multiple class="form-control" name="categories[]" id="categories"></select>
                <br>


                <label for="stock">Stock</label>
                <br>
                <input type="text" name="stock" id="stock" value="{{$book->stock}}" class="form-control">
                <br>

                <label for="author">Author</label>
                <br>
                <input type="text" name="author" id="author" value="{{$book->author}}" class="form-control">
                <br>

                <label for="publisher">Publisher</label>
                <br>
                <input type="text" name="publisher" id="publisher" value="{{$book->publisher}}" class="form-control">
                <br>

                <label for="price">Price</label>
                <br>
                <input type="text" name="price" id="price" value="{{$book->price}}" class="form-control">
                <br>

                <label for="satus">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{$book->status == 'PUBLISH' ? 'selected' : ''}} value="PUBLISH">PUBLISH</option>
                    <option {{$book->status == 'DRAFT' ? 'selected' : ''}} value="DRAFT">DRAFT</option>
                </select>
                    <br>

                    <button class="btn btn-primary" value="PUBLISH">Update</button>
            </form>
        </div>
    </div>
@endsection

@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $('#categories').select2({
        ajax: {
            url: 'http://127.0.0.1:8000/ajax/categories/search',
            processResults: function(data){
            return { results: data.map(function(item){return {id: item.id, text:item.name} })}
                }
            }
    });
        var categories = {!! $book->categories !!}
        categories.forEach(function(category){
            var option = new Option(category.name, category.id, true, true);
            $('#categories').append(option).trigger('change');
        });
</script>
@endsection
