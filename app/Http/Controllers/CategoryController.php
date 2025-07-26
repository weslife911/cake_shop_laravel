<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function add_category_view() {
        return view("pages.admin.add_category");
    }

    function list_categories() {
        $categories = Category::all();
        return view("pages.admin.list_categories", ["categories" => $categories]);
    }

    function add_category(Request $request) {
        $validate = Validator::make(request()->all(), [
            "name" => ["required", "string", "max:255"]
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $category = Category::create([
                "name" => $request->name
            ]);
            if($category) {
                flash()->success('Category created successfully!');
                return redirect()->route("admin.dashboard");
            } else {
                flash()->error("Error deleting category");
            }
        }

    }
}
