<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Jobs\OrderConfirmed;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'product_name' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Create an order
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
        ]);

        // Dispatch the job to send the confirmation email
        OrderConfirmed::dispatch($order);

        return response()->json(['message' => 'Order placed successfully!'], 201);
    }
}

