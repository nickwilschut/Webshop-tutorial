<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller 
{

	// Test function to display everything in session.
    public function test() {
    	$cart = new Cart();

    	$session = session()->all();
    	
    	return view('cart.index', ['session' => $session]);
    }

    public function addToCart($product) {
    	$cart = new Cart();

    	$cart->addToCart($product);

    	$session = session()->all();

    	//return view('cart.index', ['session' => $session]);
    	header("Location: http://127.0.0.1:8000/cart");
    	die();
    }

    public function emptyCart () {
    	$cart = new Cart();

    	$cart->emptyCart();
    	header("Location: http://127.0.0.1:8000/cart");
    	die();
    }
}
