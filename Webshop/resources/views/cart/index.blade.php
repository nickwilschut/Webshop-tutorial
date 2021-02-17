@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-3">
                <div class="card-header">Shopping cart info:</div>
                <div class="card-body">
                    @if ($session['cart'] == null)
                        <div class="text-secondary ml-1">
                            Your cart is currently empty.
                        </div>
                    @else
                        @foreach($session['cart'] as $cart)
                            <div class="card my-3 d-flex">
                                <div class="card-body flex-column">
                                    <div class="row">

                                        <div class="col-3">
                                            <img src="{{ $cart->image_url }}" />
                                        </div>

                                        <div class="col-6">
                                            <div class="text-secondary mt-3">
                                                {{ $cart->name }}
                                            </div>
                                            <div class="text-success">€{{ $cart->price }}</div>
                                        </div>
                                        <div class="col-3 mt-3">
                                            <p>Amount: {{ $cart->amount }}</p>
                                            <a href="/cart/addToAmount/{{ $cart->id }}" class="btn-sm btn-info">+</a>
                                            <a href="/cart/lowerAmount/{{ $cart->id }}" class="btn-sm btn-warning">-</a>
                                            <a class="btn-sm btn-dark" data-toggle="modal" data-target="#removeProduct">remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="float-left">
                            <p>total price: @foreach($session['totalPrice'] as $s) {{$s}} @endforeach</p>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#paymodal">Check out</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#emptymodal">Empty cart</button>

                            <!-- Modal -->
                            <div class="modal fade" id="paymodal" tabindex="-1">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <div>The total price is: @foreach($session['totalPrice'] as $s) {{$s}} @endforeach</div>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="/cart/pay" type="button" class="btn btn-success">Pay €@foreach($session['totalPrice'] as $s) {{$s}} @endforeach</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="removeProduct" tabindex="-1">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <div>Are your sure you want to remove this item?</div>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="/cart/removeFromCart/{{ $cart->id }}" type="button" class="btn btn-danger">Remove item</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="emptymodal" tabindex="-1">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <div>Are you sure you want to empty your cart?</div>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="/cart/emptycart" type="button" class="btn btn-danger">Empty</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    @endif
                    <a href="/products" class="text-success ml-1">Click here to continue shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
