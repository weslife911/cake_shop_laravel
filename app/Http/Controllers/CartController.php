<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    function cart_view() {
        $carts = Cart::where("user_id", Auth::user()->id)->paginate(5);
        
        return view("pages.auth.cart", ["carts" => $carts]);
    }

    function add_product_to_cart(Request $request) {
        $cart = Cart::create([
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
            "quantity" => $request->quantity
        ]);

        if($cart) {
            flash()->success("Cart Product added successfully");
            return redirect()->route("cart");
        } else {
            flash()->error("Error while adding cart product");
        }
    }

    function remove_product_from_cart($id) {
        $cart = Cart::find($id);
        if($cart) {
            $cart->delete();
            flash()->success("Product removed from cart successfully");
            return redirect()->route("cart");
        } else {
            flash()->error("Error while removing product from cart");
        }
    }

}
