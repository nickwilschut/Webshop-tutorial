<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Controllers\OrderController;

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

    public function getCart() {
    	$this->calculatePrice();
		// set $data variable.
		$data = [];
    
    	// check if session is set correctly
    	if (session()->all() != null && session()->has('cart') && session()->has('totalPrice')) {
			$data['cart'] = session()->get('cart');
			$data['totalPrice'] = session()->get('totalPrice');

			// return data to controller.
			return $data;
		} else {
			$this->__construct();
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
    			$this->__construct();
    		}
    	} else {
    		$this->__construct();
    	}
    	
    }

    // Fuction to calculate the total price of all items in the shopping cart.
    public function calculatePrice() {
    	// set totalprice
    	session(['totalPrice' => [] ]);

    	// get the cart.
    	if (session()->has('cart')) {
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
		} else {
			$this->__construct();
		}

    } 

    // Function to empty/remove the cart
    public function emptyCart() {

    	// check if session has a cart.
    	if (session()->has('cart')) {
	    	// unset cart.
	    	session()->forget('cart');
	    	session()->save();
	    	// call construct function to create new empty cart.
	    	$this->__construct();
	    } else {
			$this->__construct();
		}
    }

    // Function to higher the amount of the item in the shopping cart.
    public function addToAmount($id) {
    	// Get product from DB where $id
    	$products = \App\Models\Product::findOrFail($id);

    	// get product from session where $id.
    	if (session()->has('cart')) {
	    	$product = session()->get('cart.' . $id);

	    	// calculation.
	    	$product['amount'] = $product['amount'] + 1;
	    	$product['price'] = $product['price'] + $products['price'];
	    	
	    	// Set new product data.
			session()->pull('cart.' . $id, $product);
			session()->put('cart.' . $id, $product);
			session()->save();
		} else {
			$this->__construct();
		}
    }

    // Function to lower the amount of the item in the shopping cart.
    public function lowerAmount ($id) {
    	// Get product from DB where $id
    	$products = \App\Models\Product::findOrFail($id);

    	// get product from session where $id.
    	if (session()->has('cart')) {
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
		} else {
			$this->__construct();
		}

    }

    // Function to remove a product from the shopping cart.
    public function removeProduct ($id) {
    	// get the product where $id
    	if (session()->has('cart')) {
	    	$product = session()->get('cart.' . $id);

	    	// Remove product form session.
	    	session()->pull('cart.' . $id, $product);
	    	session()->save();
	    } else {
			$this->__construct();
		}
    }

    public function getCartForOrder() {
    	// check if cart exists.
    	if (session()->has('cart')) {

    		// set data.
    		$cart = session()->get('cart');
    		$price = session()->get('totalPrice');
    		$order = array();
    			
    		// Push to order array.
    		array_push($order, ['price' => $price[0]]);
    		foreach ($cart as $products) {
				array_push($order, $products['name']);
    		}
    		
    		// encode order for url.
    		$order = serialize($order);
    		$order = urlencode($order);

    		// empty the shoppingcart.
    		$this->emptyCart();

    		// redirect to the order insert.
	    	header("Location: http://127.0.0.1:8000/order/insert/" . $order);
	    	die();
    	} else {
    		$this->__construct();
    	}
    }
}














