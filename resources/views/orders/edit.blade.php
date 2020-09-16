@extends('layouts.global')

@section('title')
    Edit Order
@endsection

@section('content')

    <div class="col">
        <div class="col-md-8">

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <form class="shadow-sm bg-white p-3" action="{{route('orders.update', [$order->id])}}" method="POST">
                @csrf

                <input type="hidden" name="_method" value="PUT">


                <label for="invoice_number">Invoice Number</label>
                <br>
                <input type="text" class="form-control" value="{{$order->invoice_number}}" disabled>
                <br>

                <label for=""> Buyer</label>
                <br>
                <input type="text" class="form-control" value="{{$order->user->name}}" disabled>
                <br>

                <label for="created_at">Order Date</label>
                <br>
                <input type="text" class="form-control" value="{{$order->created_at}}" disabled>
                <br>

                <label for="">Books ({{$order->totalQuantity}})</label>
                <ul>
                    @foreach($order->books as $book)
                        <li>{{$book->title}} <b> ({{$book->pivot->quantity}})</b></li>
                    @endforeach
                </ul>
                <br>

                <label for="">Total Price</label>
                <br>
                <input type="text" class="form-control" value="{{$order->total_price}}" disabled>
                <br>

                <label for="status">Status</label>
                <br>
                <select name="status" id="status" class="form-control">
                    <option {{$order->status == "SUBMIT" ? "selected" : ""}} value="SUBMIT"></option>
                    <option {{$order->status == "PROCESS" ? "selected" : ""}} value="PROCESS"></option>
                    <option {{$order->status == "FINISH" ? "selected" : ""}} value="FINISH"></option>
                    <option {{$order->status == "CANCEL" ? "selected" : ""}} value="CANCEL"></option>
                </select>
                <br>

                <input type="submit" class="btn btn-primary" value="Update">

            </form>

        </div>
    </div>

@endsection

