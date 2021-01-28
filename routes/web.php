<?php

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

Route::get('/register', function () {
    return view('userSignUp.register');
});
Route::get('/login', function () {
    return view('userSignUp.login');
});
Route::get('/forget', function () {
    return view('userSignUp.forgetpassword');
});
Route::get('/', function () {
    return view('userSignUp.userviewpage');
});
Route::get('/edit', function () {
    return view('userSignUp.usereditpage');
});
Route::get('/acc', function () {
    return view('userSignUp.accountsettingpage');
});

