@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron text-center">
                <h1>Categories</h1>
            </div>

            @foreach($categories as $category)
            <div class="card my-3 d-flex">
                <div class="card-header">{{ $category->name }}</div>

                <div class="card-body flex-column">
                    <div class="row">

                        <div class="col-3">
                            <img src="{{ $category->image_url }}" />
                        </div>

                        <div class="col-9 border-left">
                            <a href="products/{{ $category->id }}" class="btn btn-primary">View</a>

                            <div class="btn btn-link">
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
