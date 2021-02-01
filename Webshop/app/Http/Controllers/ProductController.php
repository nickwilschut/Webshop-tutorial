<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
    	$products = \App\Models\Product::all();

    	return view('product.index', ['products' => $products]);
    }
}
