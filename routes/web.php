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

// show register & login page
Route::get('/register', 'RegisterController@show')->name('register')->middleware('guest');
Route::get('/login','LoginController@show')->name('login')->middleware('guest');
Route::get('/forget','LoginController@forgetpass')->name('forget')->middleware('guest');

// register & login user
Route::post('/login', 'LoginController@authenticate');
Route::post('/register', 'RegisterController@register');
Route::post('/forget','LoginController@forgetpass');

// Protected Routes - allows only logged in users
Route::middleware('auth')->group(function () {
   
    Route::get('/edit-user', 'UserDashboardController@editUser');
    Route::get('/account-settings', 'UserDashboardController@accountSetting');
    Route::post('/logout', 'LoginController@logout')->name('logout.me');
    Route::get('/', 'UserDashboardController@index')->name('userdashboard'); //userviewpage
    
});

