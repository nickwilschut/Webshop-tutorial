<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
	// Index function to display all categories.
    public function index() {
    	$categories = \App\Models\Category::all();

    	return view('category.index', ['categories' => $categories]);
    }

    // Show function to display 1 specific category.
    public function show($id) {
    	$categories = \App\Models\Category::findOrFail($id);

        return view('category.view', ['category' => $categories]);
    }
}
