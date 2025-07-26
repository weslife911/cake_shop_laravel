<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage; 

class ProductController extends Controller
{
    //
    public function add_prdouct_view() {
        $categories = Category::all();
        return view("pages.admin.add_product", ["categories" => $categories]);
    }

    public function list_products_view() {
        $products = Product::all();
        return view("pages.admin.list_products", ["products" => $products]);
    }

    public function add_product(Request $request) {
        $validate = Validator::make($request->all(), [
            "name" => ["required", "string", "max:255"],
            "price" => ["required",],
            "category_id" => ["required", "exists:categories,id"],
            "description" => ["required", "string"],
            "image" => ["required","image", "mimes:jpg,png,jpeg,gif", "max:2048"],
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            if($request->hasFile("image") && $request->file("image") && $request->file("image")->isValid()) {
                $image = $request->file("image")->store("products", "public");
                $product = Product::create([
                    "name" => $request->name,
                    "price" => $request->price,
                    "category_id" => $request->category_id,
                    "description"=> $request->description,
                    "image"=> $image,
                ]);
                if($product) {
                    flash()->success("Product added successfully");
                    return redirect()->route("list.products");
                }
            }
        }
    }

    public function edit_product_view(Request $request, $id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view("pages.admin.edit_product", ["product" => $product, "categories" => $categories]);
    }

    public function edit_product(Request $request, $id) {
        $product = Product::find($id);
        $validate = Validator::make($request->all(), [
            "name" => ["required", "string", "max:255"],
            "price" => ["required",],
            "category_id" => ["required", "exists:categories,id"],
            "description" => ["required", "string"],
            "image" => ["image", "mimes:jpg,png,jpeg,gif", "max:2048"],
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {

            $imagePath = $product->image;

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                if($imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }
                $imagePath = $request->file('image')->store('products', 'public');
        }

            $product->name = $request->name;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->image = $imagePath;
            $product->save();
            flash()->success("Product updated successfully");
            return redirect()->route("list.products");
        }

    }

    public function delete_product($id) {
        $product = Product::find($id);
        if($product) {
            Storage::disk('public')->delete($product->image);
            $product->delete();
            flash()->success("Product deleted successfully");
            return redirect()->route("list.products");
        } else {
            flash()->error("Error while deleting image");
        }
    }
}
