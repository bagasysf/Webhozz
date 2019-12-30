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

Route::get('/category', 'CategoryController@index');
Route::get('/category/create', 'CategoryController@create');

Route::get('/', function () {

    $message = "But Laravel is Awesome";
    $language = ['PHP', 'Javascript', 'JAVA', 'Phyton', 'Golang'];
    $number = 10 * 5;

    return view('test', [
        'language' => $language,
        'message' => $message,
        'number' => $number
    ]);
});
