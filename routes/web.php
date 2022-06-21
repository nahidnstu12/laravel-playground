<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookController;
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

Route::get("/products", [ProductController::class, "index"]);
Route::post("/products", [ProductController::class, "create"]);
Route::get("/products/{id}", [ProductController::class, "single"]);
Route::put("/products/{id}", [ProductController::class, "update"]);
// Route::put("/products/{id}", [ProductController::class, "edit"]);
Route::delete("/products/{id}", [ProductController::class, "destroy"]);

Route::get("/crud", [ProductController::class, "index2"]);
Route::post("/crud", [ProductController::class, "create2"]);
Route::get("/crud/{id}", [ProductController::class, "single2"]);
Route::put("/crud/{id}", [ProductController::class, "update2"]);
// Route::put("/products/{id}", [ProductController::class, "edit"]);
Route::delete("/crud/{id}", [ProductController::class, "destroy2"]);

Route::resource("/books", BookController::class);
Route::get("/course-certificate", [ProductController::class, "courseCertificate"])->name("course.certificate");
// testing code
Route::group(["prefix"=> "trainer"], function (){
    Route::group(["prefix"=> "/courses"], function (){
        Route::get('/', [\App\Http\Controllers\TrainerController::class, 'courses'])->name('course.index.trainer')->can('create-course');
        Route::get('/create', [\App\Http\Controllers\CourseController::class, 'create'])->name('course.trainer')->can('create-course');
        Route::post('/create', [\App\Http\Controllers\CourseController::class, 'store'])->name('course.trainer')->can('create-course');

    });
});