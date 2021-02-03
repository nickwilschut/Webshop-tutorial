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
                            <a href="/addtocart/{{ $product->id }}" class="btn btn-success">Add to cart</a>

                            <div class="text-secondary">
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



