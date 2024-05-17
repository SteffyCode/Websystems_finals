<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart; // Assuming you have a Cart model

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function placeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'payment_method' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            DB::transaction(function () use ($request) {
                $order = Order::create([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'address' => $request->input('address'),
                    'city' => $request->input('city'),
                    'state' => $request->input('state'),
                    'zip' => $request->input('zip'),
                    'payment_method' => $request->input('payment_method'),
                    // Add other fields as necessary
                ]);
    
                $cartItems = Cart::instance('cart')->content();
    
                foreach ($cartItems as $cartItem) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $cartItem->id,
                        'quantity' => $cartItem->qty,
                        'price' => $cartItem->price,
                    ]);
                }
    
                Cart::instance('cart')->destroy();
            });
    
            return redirect()->route('checkout.success')->with('message', 'Your order has been placed successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to place order. Please try again later.');
        }
    }
    
}
