<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Index function to display all products.
    public function index() {
    	$userId = Auth::id(); 
    	// get function to get all orders.
    	$orders = \App\Models\Order::where('user_id', $userId)->get();

    	// Display view.
    	return view('order.index', ['orders' => $orders]);
    }

    public function insert($order) {
		
		// check if data is set.
    	if (isset($order)) {
    		$newOrder = new Order();

    		// call insert function.
    		$newOrder->insert($order);
    	} else {
    		// Call error function.
    		return $this->error();
    	}
    }

    // Funtion to display error message.
    public function error() {
    	$order = new Order();

    	// call error function.
    	$order->error();
    }
}
