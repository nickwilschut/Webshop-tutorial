@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-3">
                <div class="card-header">Shopping cart</div>

                <div class="card-body">
                    @if ($session['cart'] == null)
                        <div class="text-secondary">
                            Your cart is currently empty.
                            <a href="/products" class="text-success">Click here to continue shopping</a>
                        </div>
                        
                    @else
                        @foreach($session['cart'] as $s)
                            <li>{{ $s }}</li>
                        @endforeach
                        <div class="float-right">
                            <a href="/emptycart" class="btn-sm btn-success">Check out</a>
                            <a href="/emptycart" class="btn-sm btn-danger">Empty cart</a>
                        </div>
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
