<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Search for an order by order number and email.
     */
    public function search(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $order = Order::where('order_number', $validated['order_number'])
            ->where(function ($query) use ($validated) {
                $query->whereHas('user', function ($userQuery) use ($validated) {
                    $userQuery->where('email', $validated['email']);
                })->orWhere('shipping_address->email', $validated['email']);
            })
            ->with(['orderItems.product'])
            ->first();

        if (! $order) {
            return back()->withErrors(['order_number' => 'Order not found. Please verify your order number and email.']);
        }

        return view('track-order', compact('order'));
    }
}
