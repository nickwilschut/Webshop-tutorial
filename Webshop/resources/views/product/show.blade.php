@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-3 d-flex">
                <div class="card-header">{{ $products->name }}</div>

                <div class="card-body flex-column">
                    <div class="row">

                        <div class="col-3">
                            <img src="{{ $products->image_url }}" />
                        </div>

                        <div class="col-9 border-left">
                            <a href="/cart/addtocart/{{ $products->id }}" class="btn btn-success">Add to cart</a>
                            <a href="/cart/addtocart/{{ $products->id }}" class="link text-success ml-2">€{{ $products->price }}</a>

                            <div class="text-secondary mt-3">
                                omschrijving
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



