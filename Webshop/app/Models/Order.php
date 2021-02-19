<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Scopes\OrderScope;
use DB;

class Order extends Model
{
    use HasFactory;

     protected static function booted()
    {
        static::addGlobalScope(new OrderScope);
    }

    public function getOrders() {
    	// Set userId.
    	$userId = Auth::id(); 
    	// get function to get all orders.
    	$orders = \App\Models\Order::all();

    	// return the orders.
    	return $orders;
    }

    public function insert($order) {

    	// decode the order data.
    	$order = unserialize(urldecode($order));

    	// set data.
		$price = $order[0];
		$userId = Auth::id(); 

		// remove price from the data array so only the product_id's are left.
		unset($order[0]);

		// check if data is set.
		if (isset($order) && isset($price) && isset($userId)) {
			// insert.
			if ($orders = DB::table('orders')->insert([['user_id' => $userId, 'product_name' => implode(', ', $order), 'price' => json_encode($price['price'])]])) {
				// redirect back to order.
		    	return true;
			} else {
				// call error function.
				$this->error();
			}
		} else {
			// call error function.
			$this->error();
		}	
    }

    // error function.
    public function error() {
    	return false;
    }
}
