<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{

    // public function index()
    // {
    //     $cartItems = Cart::newIstance('cart')->content();
    //     return view('cart', compact('cartItems'));
    // }

    public function addToCart(Request $request)
    {
        // Retreive the product details
        $product_id = $request->product_id;
        $quantity = $request->bod_quantity;
        $user_id = $request->user_id;
        $cart = Cart::where("user_id", $user_id)->first();

        if (!$cart) {
            $cart = new Cart();
        }
        
        $product = Product::find($product_id);
        $price = $product->sale_price ? $product->sale_price : $product->regular_price;
        //Add item to the cart
        
        $cart = Cart::insert([
            'user_id', $user_id,
            'product_id', $product->id,
            'quantity', $quantity,
            'price', $price * $quantity
        ]);
    
        if($cart) {
            return redirect()->back()->with('message','Success ! Item has been added successfully!');
        }
    }  

    public function updateCart(Request $request)
{
    Cart::instance('cart')->update($request->rowId,$request->quantity);
    return redirect()->route('cart.index');
} 
    public function removeItem(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');
    } 

    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }

    public function placeOrder(Request $request, CheckoutController $checkoutController)
    {
        // Call the placeOrder method from the CheckoutController
        return $checkoutController->placeOrder($request);
    }
    
}


