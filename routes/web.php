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

// Single-auth-routes
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

// Multi-auth-routes
// show register & login page
Route::get('/register/mauth', 'MultiAuth\RegisterController@show')->name('register.mauth')->middleware('guest');
Route::get('/login/mauth','MultiAuth\LoginController@show')->name('login.mauth')->middleware('guest');

// register & login user
Route::post('/login/mauth', 'MultiAuth\LoginController@authenticate');
Route::post('/register/mauth', 'MultiAuth\RegisterController@register');

// Protected Routes - allows only logged in users
Route::middleware('auth')->group(function () {
   
    Route::post('/logout/mauth', 'MultiAuth\LoginController@logout')->name('logout.me');

    Route::get('/admin/board', 'MultiAuth\AdminController@show')->name('admin.board')->middleware('admin'); //admin board

    Route::get('/admin/userlist', 'MultiAuth\AdminController@userlist_show')->name('admin.userlist')->middleware('admin'); //admin board userlist

    Route::get('/product/board', 'MultiAuth\ProductBoardController@show')->name('product.board')->middleware('product'); //product board

    Route::get('/dress/board', 'MultiAuth\DressBoardController@show')->name('dress.board')->middleware('dress'); //dress board

    Route::get('/user/board', 'MultiAuth\NormalUserBoardController@show')->name('normal.board')->middleware('normal_user'); //normal board
    
});
