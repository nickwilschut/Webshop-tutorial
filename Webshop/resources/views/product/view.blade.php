@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron text-center">
                <h1>Products(s) for this category</h1>
            </div>

            @foreach($products as $product)
            <div class="card my-3 d-flex">
                <div class="card-header">{{ $product->name }}</div>

                <div class="card-body flex-column">
                    <div class="row">

                        <div class="col-3">
                            <img src="{{ $product->image_url }}" />
                        </div>

                        <div class="col-9 border-left">
                            <a href="/product/{{ $product->id }}" class="btn btn-success">View</a>
                            <a href="/addtocart/{{ $product->id }}" class="btn btn-primary">Add to cart</a>

                            <div class="text-secondary">
                                omschrijving
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



