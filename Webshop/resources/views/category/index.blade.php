@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($categories as $cat)
            <div class="card my-3">
                <div class="card-header">{{ $cat->name }}</div>

                <div class="card-body">
                    <img src="{{ $cat->image_url }}" />
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
