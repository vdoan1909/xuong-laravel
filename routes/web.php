<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatalogueController;
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
    });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
