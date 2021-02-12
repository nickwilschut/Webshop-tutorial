<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart {
    use HasFactory;

    public function __construct() {
    	// if cart does not exist, create new.
    	if ( ! session()->has('cart')) {
    		// Make empty cart in session.
	    	session(['cart' => [] ]);
	    	session()->save();
	    }
    }

    // Add to cart function to add new products to cart.
    public function addToCart($id) {
    	// get the product by Id for the shoppingcart.
    	$product = \App\Models\Product::findOrFail($id);

    	$id = $product['id'];

    	// check if session exists.
    	if (session()->all() != null) {
    		$session = session()->all();
    		// check if session has cart.
    		if (session()->has('cart') && is_array($session)) {

    			// Insert product in cart
    			session()->put('cart.' . $id, $product);
		    	session()->save();
    		} else {
    			__constructor();
    		}
    	} else {
    		__constructor();
    	}
    	
    }

    // Fuction to calculate the total price of all items in the shopping cart.
    public function calculatePrice() {
    	// set totalprice
    	session(['totalPrice' => [] ]);

    	// get the cart.
    	$products = session()->get('cart');
		$total = 0;
    	// loop products to get price. 
    	foreach ($products as $product) {
    		$price = $product['price'];
    		// calculate price.
    		$total+= $price;
    	}

    	// Insert total price in cart.
		session()->push('totalPrice', $total);
		session()->save();
    } 

    // Function to empty/remove the cart
    public function emptyCart() {

    	// unset cart.
    	session()->forget('cart');
    	session()->save();
    }

    // Function to higher the amount of the item in the shopping cart.
    public function addToAmount($id) {
    	// Get product from DB where $id
    	$products = \App\Models\Product::findOrFail($id);

    	// get product from session where $id.
    	$product = session()->get('cart.' . $id);

    	// calculation.
    	$product['amount'] = $product['amount'] + 1;
    	$product['price'] = $product['price'] + $products['price'];
    	
    	// Set new product data.
		session()->pull('cart.' . $id, $product);
		session()->put('cart.' . $id, $product);
		session()->save();
    }

    // Function to lower the amount of the item in the shopping cart.
    public function lowerAmount ($id) {
    	// Get product from DB where $id
    	$products = \App\Models\Product::findOrFail($id);

    	// get product from session where $id.
    	$product = session()->get('cart.' . $id);

    	// calculation.
		$product['amount'] = $product['amount'] - 1;
		$product['price']= $product['price'] - $products['price'];

		// check if product amount is lower than 1.
		if ($product['amount'] < 1) {
			// remove item.
			session()->pull('cart.' . $id, $product);
    		session()->save();
		} else {
			// Set new product data.
			session()->pull('cart.' . $id, $product);
			session()->put('cart.' . $id, $product);
			session()->save();
		}
		
    }

    // Function to remove a product from the shopping cart.
    public function removeProduct ($id) {
    	// get the product where $id
    	$product = session()->get('cart.' . $id);

    	// Remove product form session.
    	session()->pull('cart.' . $id, $product);
    	session()->save();
    }
}














