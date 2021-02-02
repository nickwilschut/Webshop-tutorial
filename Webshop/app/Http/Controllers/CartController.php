<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller 
{

	// Test fuction to display everything in session.
    public function test() {
    	$cart = new Cart();

    	$session = session()->all();

    	return view('cart.index', ['session' => $session]);
    }
}
