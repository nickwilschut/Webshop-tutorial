<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller 
{
	// Index function to display all products.
    public function index() {
    	$products = \App\Models\Product::all();

    	return view('product.index', ['products' => $products]);
    }

    // Show function to display 1 specific product.
    public function show($id) {
    	$products = \App\Models\Product::findOrFail($id);

        return view('product.show', ['products' => $products]);
    }

    // Function to display all products for 1 category.
    public function showMultiple($id) {
    	$products = \App\Models\Product::where('category_id', $id)->get();

        return view('product.view', ['products' => $products]);
    }
}
