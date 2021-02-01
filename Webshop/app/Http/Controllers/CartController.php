<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller {
    public function test() {
    	$cart = new Cart();

    	$session = session()->all();

    	return view('cart.test', ['session' => $session]);
    }

}
