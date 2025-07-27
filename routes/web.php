<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get("/", [CakeController::class,"index"])->name("home");
Route::get("/about", function() {
    return view("pages.common.about");
})->name("about");
Route::get("/contact", [ContactController::class,"contact_view"])->name("contact");
Route::post("/send/mail", [ContactController::class, "sendMail"])->name("send_mail");

Route::middleware(['auth', 'admin'])->group(function() {
    Route::prefix("/admin")->group(function() {
        Route::get("/dashboard", [AdminController::class, "admin_dashboard_view"])->name("admin.dashboard");
        Route::get("/add/product", [ProductController::class, "add_prdouct_view"])->name("add.product");
        Route::get("/products", [ProductController::class, "list_products_view"])->name("list.products");
        Route::post("/add/product", [ProductController::class, "add_product"])->name("add.product");
        Route::get("/add/category", [CategoryController::class, "add_category_view"])->name("add.category");
        Route::get("/categories", [CategoryController::class, "list_categories"])->name("list.categories");
        Route::post("/add/category", [CategoryController::class, "add_category"])->name("add.category");
        Route::get("/edit/product/{id}", [ProductController::class, "edit_product_view"])->name("edit.product");
        Route::put("/edit/product/{id}", [ProductController::class, "edit_product"])->name("edit.product");
        Route::delete("/delete/product/{id}", [ProductController::class, "delete_product"])->name("delete.product");
        Route::get("/edit/category/{id}", [CategoryController::class, "edit_category_view"])->name("edit.category");
        Route::put("/edit/category/{id}", [CategoryController::class, "edit_category"])->name("edit.category");
        Route::delete("/delete/category/{id}", [CategoryController::class, "delete_category"])->name("delete.category");
        Route::get("/users", [AdminController::class, "admin_users_view"])->name("admin.users");
        Route::delete("/user/delete/{id}", [AdminController::class, "admin_delete_user_account"])->name("admin.user.delete");
        Route::get("/edit/user/{id}", [AdminController::class, "admin_user_edit_view"])->name("admin.user.edit");
        Route::put("/edit/user/{id}", [AdminController::class, "admin_edit_user"])->name("admin.user.edit");
    });
});

Route::get("/product/{id}", [CakeController::class, "get_product"])->name("product.detail");
Route::get("/shop", [CakeController::class, "shop_view"])->name("shop");

Route::middleware("auth")->group(function () {
    Route::get("/cart", [CartController::class, "cart_view"])->name("cart");
    Route::post("/cart/add/product", [CartController::class, "add_product_to_cart"])->name("add.to.cart");
    Route::delete("/cart/delete/{id}", [CartController::class, "remove_product_from_cart"])->name("cart.delete");
});