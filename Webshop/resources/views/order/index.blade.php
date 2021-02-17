@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron text-center">
                <h1>View your orders</h1>
            </div>

            @foreach($orders as $order)
            <div class="card my-3 d-flex">
                <div class="card-header">Order date: {{ $order->created_at }}</div>

                <div class="card-body flex-column">
                    <div class="row">
                        <div class="col-3">
                             Total price: €{{ $order->price }}
                        </div>

                        <div class="col-9 border-left">

                            <div class="text-secondary">
                               <p>products: <div class="text-success">{{ $order->product_name }}</div> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

