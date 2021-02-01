@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($products as $product)
            <div class="card my-3">
                <div class="card-header">{{ $product->name }}</div>

                <div class="card-body">
                    <img src="{{ $product->image_url }}" />
                    <ul>
                        <li>omschrijving</li>
                    </ul>
                </div>
            </div>
             @endforeach
        </div>
    </div>
</div>
@endsection
