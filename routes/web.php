<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get("/", [App\Http\Controllers\CakeController::class,"index"])->name("home");
Route::get("/about", function() {
    return view("pages.common.about");
})->name("about");
Route::get("/contact", [App\Http\Controllers\ContactController::class,"contact_view"])->name("contact");
Route::post("/send/mail", [App\Http\Controllers\ContactController::class, "sendMail"])->name("send_mail");

Route::middleware(['auth', 'admin'])->group(function() {
    Route::prefix("/admin")->group(function() {
        Route::get("/dashboard", [App\Http\Controllers\AdminController::class, "admin_dashboard_view"])->name("admin.dashboard");
        Route::get("/add/product", [App\Http\Controllers\ProductController::class, "add_prdouct_view"])->name("add.product");
        Route::get("/products", [App\Http\Controllers\ProductController::class, "list_products_view"])->name("list.products");
        Route::post("/add/product", [App\Http\Controllers\ProductController::class, "add_product"])->name("add.product");
        Route::get("/add/category", [App\Http\Controllers\CategoryController::class, "add_category_view"])->name("add.category");
        Route::get("/categories", [App\Http\Controllers\CategoryController::class, "list_categories"])->name("list.categories");
        Route::post("/add/category", [App\Http\Controllers\CategoryController::class, "add_category"])->name("add.category");
        Route::get("/edit/product/{id}", [App\Http\Controllers\ProductController::class, "edit_product_view"])->name("edit.product");
        Route::put("/edit/product/{id}", [App\Http\Controllers\ProductController::class, "edit_product"])->name("edit.product");
        Route::delete("/delete/product/{id}", [App\Http\Controllers\ProductController::class, "delete_product"])->name("delete.product");
    });
});

Route::get("/product/{id}", [App\Http\Controllers\CakeController::class, "get_product"])->name("product.detail");
Route::get("/shop", [App\Http\Controllers\CakeController::class, "shop_view"])->name("shop");