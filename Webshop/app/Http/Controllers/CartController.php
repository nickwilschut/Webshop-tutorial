<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller 
{

	// createCart function to display the cart and totalprice.
    public function createCart() {
    	$cart = new Cart();

        // call getCart function.
        $data = $cart->getCart();

    	// return shopping cart view.
    	return view('cart.index', ['data' => $data]);
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
    	return $this->createCart();
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

        // call function to process the order.
        $cart->getCartForOrder();
    }
}
