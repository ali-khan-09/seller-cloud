<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class OrdersController extends Controller
{
     public function index()
	{
		$orders = Order::all();
        return view('dashboard.orders.index' , compact('orders'));
	}
	public function show(Request $request)
	{
		$id = $request->order;
        return $users = DB::table('orders as orr')
            ->join('details as d', 'orr.cart_id', '=', 'd.cart_id')
            ->join('carts as c', 'orr.cart_id', '=', 'c.id')
            ->join('products as p', 'd.product_id', '=', 'p.product_id')
            ->select('c.id as c_id','c.is_checked','p.id as p_id', 'p.product_id', 'p.product_name', 'category_id', 'orr.id as o_id', 'orr.cart_id', 'orr.last_name', 'orr.phone', 'orr.email', 'orr.company', 'orr.address', 'orr.city', 'orr.state', 'orr.zip', 'orr.comments', 'orr.shipping_method', 'orr.is_multiple_shipping','orr.created_at', 'd.id as d_id', 'd.cart_id', 'd.product_id', 'd.qty', 'd.price')
            ->get();


	}
	public function status(Request $request)
	{
		$status = (int)$request->status;
	    $id = (int)$request->id;
	    $order = Order::find($id);
	    $order->update(
				[
					'order_status' => $status
			    ]
			  );
	    $order = Order::find($id);
		return response()->json(['success',$order]);
		// return redirect(route('dashboard.orders.index'));
	}

}
