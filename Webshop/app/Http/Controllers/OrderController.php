<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Index function to display all products.
    public function index() {
    	$order = new Order();

    	// call to model to get all orders.
    	$orders = $order->getOrders();
    	
    	// Display view.
    	return view('order.index', ['orders' => $orders]);
    }

    public function insert($order) {
		
		// check if data is set.
    	if (isset($order)) {
    		$newOrder = new Order();

    		// call insert function.
    		if ($newOrder->insert($order)) {
    			return $this->index();
    		}
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
