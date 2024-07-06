<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin
Route::prefix("admin")
    ->as("admin.")
    ->group(function () {
        Route::get("/", [AdminController::class, "index"])->name("index");
        // Catalogue
        Route::prefix("catalogue")
            ->as("catalogue.")
            ->group(function () {
            Route::get("/", [CatalogueController::class, "index"])->name("index");
            Route::get("show/{id}", [CatalogueController::class, "show"])->name("show");
            Route::get("create", [CatalogueController::class, "create"])->name("create");
            Route::post("store", [CatalogueController::class, "store"])->name("store");
            Route::get("edit/{id}", [CatalogueController::class, "edit"])->name("edit");
            Route::put("update/{id}", [CatalogueController::class, "update"])->name("update");
            Route::delete("destroy/{id}", [CatalogueController::class, "destroy"])->name("destroy");
        });

        // Tag
        Route::prefix("tag")
            ->as("tag.")
            ->group(function () {
            Route::get("/", [TagController::class, "index"])->name("index");
            Route::get("show/{id}", [TagController::class, "show"])->name("show");
            Route::get("create", [TagController::class, "create"])->name("create");
            Route::post("store", [TagController::class, "store"])->name("store");
            Route::get("edit/{id}", [TagController::class, "edit"])->name("edit");
            Route::put("update/{id}", [TagController::class, "update"])->name("update");
            Route::delete("destroy/{id}", [TagController::class, "destroy"])->name("destroy");
        });

        // Size
        Route::prefix("size")
            ->as("size.")
            ->group(function () {
            Route::get("/", [SizeController::class, "index"])->name("index");
            Route::get("show/{id}", [SizeController::class, "show"])->name("show");
            Route::get("create", [SizeController::class, "create"])->name("create");
            Route::post("store", [SizeController::class, "store"])->name("store");
            Route::get("edit/{id}", [SizeController::class, "edit"])->name("edit");
            Route::put("update/{id}", [SizeController::class, "update"])->name("update");
            Route::delete("destroy/{id}", [SizeController::class, "destroy"])->name("destroy");
        });

        // Color
        Route::prefix("color")
            ->as("color.")
            ->group(function () {
            Route::get("/", [ColorController::class, "index"])->name("index");
            Route::get("show/{id}", [ColorController::class, "show"])->name("show");
            Route::get("create", [ColorController::class, "create"])->name("create");
            Route::post("store", [ColorController::class, "store"])->name("store");
            Route::get("edit/{id}", [ColorController::class, "edit"])->name("edit");
            Route::put("update/{id}", [ColorController::class, "update"])->name("update");
            Route::delete("destroy/{id}", [ColorController::class, "destroy"])->name("destroy");
        });

        // Product
        Route::prefix("product")
            ->as("product.")
            ->group(function () {
            Route::get("/", [ProductController::class, "index"])->name("index");
            Route::get("show/{id}", [ProductController::class, "show"])->name("show");
            Route::get("create", [ProductController::class, "create"])->name("create");
            Route::post("store", [ProductController::class, "store"])->name("store");
            Route::get("edit/{id}", [ProductController::class, "edit"])->name("edit");
            Route::put("update/{id}", [ProductController::class, "update"])->name("update");
            Route::delete("destroy/{id}", [ProductController::class, "destroy"])->name("destroy");
        });
    });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
