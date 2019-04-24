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




Route::get('', 'InventoryController@showInventory');

Route::get('/loginold', function () {
    return view('loginpage');
});
Route::get('/itempage', function () {
    return view('itempage');
});

Route::get('/rules', function () {
    return view('rules');
});

Route::get('/stock', function () {
    return view('stock');
});

Route::get('/reports', function () {
    return view('reports');
});

Route::get('/member', function () {
    return view('member');
});

Route::get('/rentals', function () {
    return view('rentals');
});

Route::get('/ban', function () {
    return view('ban');
});




Route::post('/inventory/add', 'InventoryController@insertGame')->name('inventory.add');
Route::post('/rents/add', 'RentsController@insertRent')->name('rents.add');
Route::post('/user/ban', 'BanLogController@banUserRequest')->name('user.ban');

Route::get('/item/{id}', ['uses' =>'InventoryController@showInventoryOne']);
Route::get('/rules', ['uses' =>'RulesController@showRules']);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
