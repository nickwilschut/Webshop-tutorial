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

    	$session = session()->all();

    	session(['totalPrice' => [] ]);
    	$products = session()->get('cart');
		$total = 0;
    	// loop products to get price. 
    	foreach ($products as $product) {
    		$price = $product['price'];
    		// calculate price.
    		$total+= $price;
    	}
		session()->push('totalPrice', $total);
		session()->save();

    	return view('cart.index', ['session' => $session]);
    }

    // addToCart function to add products to the shoppingcart.
    public function addToCart($product) {
    	$cart = new Cart();

    	// get the product by Id for the shoppingcart.
    	$products = \App\Models\Product::findOrFail($product);

    	// call model.
    	$cart->addToCart($products);

    	$session = session()->all();

    	//redirect back to cart.
    	header("Location: http://127.0.0.1:8000/cart");
    	die();
    }

    // function to delete the cart from session.
    public function emptyCart() {
    	$cart = new Cart();

    	// call model.
    	$cart->emptyCart();

    	//redirect back to cart.
    	header("Location: http://127.0.0.1:8000/cart");
    	die();
    }

	// function to pay.
    public function pay () {
    	$this->emptyCart();
    }

    public function addToAmount ($id) {
    	$product = \App\Models\Product::findOrFail($id);
    	$product['amount'] = $product['amount'] + 1;
    	$product['price'] = $product['price'] + $product['price'];

    	return $this->createCart();
    }


    public function lowerAmount ($id) {
    	$product = \App\Models\Product::findOrFail($id);
    	$product['amount'] = $product['amount'] - 1;
    	$product['price'] = $product['price'] - $product['price'];

    	return $this->createCart();
    }

    /*
    public function addToAmount ($id) {
    	$amount = 1;
    	$session = session()->all();
    	$products = session()->get('cart');
    	$productOrigin = \App\Models\Product::findOrFail($id);

    	foreach ($products as $product) {
			
    	}
    	if ($product['id'] == $id) {
    		//print_r($product['price']);
    		$amount = $product['amount'] + 1;
    		$price = $product['price'] + $productOrigin['price'];
    		$data = [$price, $amount];


    		$product['price'] = $price;
    		$product['amount'] = $amount;
    		if ($amount < 1) {
    			$this->removeProduct($product);
    		}
    	}	
    	return view('cart.index', ['session' => $session]);
    }

    public function lowerAmount ($id) {
    	$amount = 1;
    	$session = session()->all();
    	$products = session()->get('cart');
    	$productOrigin = \App\Models\Product::findOrFail($id);
    	
    	foreach ($products as $product) {
			
    	}
    	if ($product['id'] == $id) {
    		//print_r($product['price']);
    		$amount = $product['amount'] - 1;
    		$price = $product['price'] - $productOrigin['price'];
    		$data = [$price, $amount];


    		$product['price'] = $price;
    		$product['amount'] = $amount;
    		if ($amount < 1) {
    			$this->removeProduct($product);
    		}
    	}	
    	return view('cart.index', ['session' => $session]);
    }

    public function removeProduct ($product) {

    }
    */
}
