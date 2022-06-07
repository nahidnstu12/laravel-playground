<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/products", [Product::class, "index"]);
Route::post("/products", [Product::class, "create"]);
Route::put("/products/{id}", [Product::class, "update"]);
Route::put("/products/{id}", [Product::class, "edit"]);
Route::delete("/products/{id}", [Product::class, "destroy"]);
