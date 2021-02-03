<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart {
    use HasFactory;

    private $items = [];

    public function __construct() {

    	if ( ! session()->has('cart')) {
	    	// maak nieuwe cart aan in de sessie (leeg).
	    	session(['cart' => [] ]);
	    	session()->save();
	    }
    }

    public function addToCart($product) {

    	if (session()->all() != null) {
    		$session = session()->all();
    		if (session()->has('cart') && is_array($session)) {

    			session()->push('cart', $product);
		    	session()->save();
    		} else {
    			__constructor();
    		}
    	} else {
    		__constructor();
    	}
    	
    }

    public function emptyCart() {

    	session()->forget('cart');
    	session()->save();
    }
}














