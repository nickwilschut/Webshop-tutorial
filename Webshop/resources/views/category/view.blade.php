@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($categories as $cat)
            <div class="card my-3 d-flex">
                <div class="card-header">{{ $cat->name }}</div>

                <div class="card-body flex-column">
                    <div class="row">

                        <div class="col-3">
                            <img src="{{ $cat->image_url }}" />
                        </div>

                        <div class="col-9 border-left">
                            <button type="button" class="btn btn-primary">
                                View
                            </button>

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
