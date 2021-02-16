<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Index function to display all products.
    public function index() {
    	$orders = \App\Models\Order::all();

    	return view('order.index', ['orders' => $orders]);
    }

    public function insert() {
    	$orders = \App\Models\Order::insert();
    }
}
