<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CakeController extends Controller
{
    //
    function index() {
        $products = Product::limit(8)->get();
        return view("pages.common.index", ["products" => $products]);
    }

    function get_product($id) {
        $product = Product::find($id);
        $related_products = Product::where("category_id", 1)->limit(5)->get();
        return view("pages.common.product_detail", ["product"=> $product, "related_products" => $related_products]);
    }

    function shop_view() {
        $products = Product::paginate(4);
        return view("pages.common.shop", ["products"=> $products]);
    }

}
