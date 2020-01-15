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

// use Illuminate\Routing\Route;

// menampilkan table
Route::get('/category', 'CategoryController@index');
// show form
Route::get('/category/create', 'CategoryController@create');
//insert ke db
Route::post('/category', 'CategoryController@store');
// insert ke db
Route::get('/category/{id}/edit', 'CategoryController@edit');
// upadate ke db
Route::put('/category/{id}', 'CategoryController@update');
// delete db 
Route::delete('/category/{id}', 'CategoryController@destroy');

Route::resource('product', 'ProductController');

Route::get('/', 'WelcomeController');


// Route::get('/', function () {

//     $message = "But Laravel is Awesome";
//     $language = ['PHP', 'Javascript', 'JAVA', 'Phyton', 'Golang'];
//     $number = 10 * 5;

//     return view('test', [
//         'language' => $language,
//         'message' => $message,
//         'number' => $number
//     ]);
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('transaction', 'Transaction\\TransactionController');
Route::resource('transaction-detail', 'TransactionDetail\\TransactionDetailController');

Route::post('add-to-cart/{id}', 'CartController');

Route::get('checkout', 'CheckoutController@index');
Route::post('checkout/{id}', 'CheckoutController@pay');
