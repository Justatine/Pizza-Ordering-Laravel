<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function viewOrderdetails($order){
        $order = Orders::with(['orderDetails.product', 'user'])->find($order);

        return view('admin.orders.order-details', [
            'order_details' => $order
        ]);
    }

    public function updateOrderstatus(Orders $order){
        $data = request()->validate([
            'status' => ['required', 'string']
        ]);

        $order->update($data);
        return redirect()->back()->with('status', 'Status updated');
    }
}
