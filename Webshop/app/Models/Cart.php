<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart {
    use HasFactory;

    private $items = [];

    public function __constructor() {
    	if ( ! session()->has('cart')) {
	    	// maak nieuwe cart aan in de sessie (leeg)
	    	session(['cart' => [] ]);
	    	session()->save();
	    } else {
	    	// haal bestaande cart op uit sessie
	    	$this->items = session['cart'];
	    }
    }
}
