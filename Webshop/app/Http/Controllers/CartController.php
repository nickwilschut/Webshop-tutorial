<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller 
{

	// createCart function to display everything in session.
    public function createCart() {
    	$cart = new Cart();

    	// call model to calculate price.
    	$cart->calculatePrice();

    	// set $session variable.
    	$session = session()->all();

    	// return shopping cart view.
    	return view('cart.index', ['session' => $session]);
    }

    // addToCart function to add products to the shoppingcart.
    public function addToCart($id) {
    	$cart = new Cart();

    	// call model.
    	$cart->addToCart($id);

    	// call create function to show cart view.
    	return $this->createCart();
    }

    // function to delete the cart from session.
    public function emptyCart() {
    	$cart = new Cart();

    	// call model.
    	$cart->emptyCart();

    	// redirect back to cart.
    	header("Location: http://127.0.0.1:8000/cart");
    	die();
    }

    // function to higher the amount of items.
    public function addToAmount ($id) {
    	$cart = new Cart();

    	// call model.
    	$cart->addToAmount($id);

    	// call create function to show cart view.
		return $this->createCart();
    }


    public function lowerAmount ($id) {
    	$cart = new Cart();

    	// call model.
    	$cart->lowerAmount($id);

    	// call create function to show cart view.
		return $this->createCart();
    }

    public function removeProduct ($product) {
    	$cart = new Cart();

    	// call model function.
    	$cart->removeProduct($product);

    	// call create function to show cart view.
		return $this->createCart();
    }

    // function to pay.
    public function pay () {
        $cart = new Cart();
        $cart->getCartForOrder();
    }
}
