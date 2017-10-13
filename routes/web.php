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


Route::get('/', function () {
    return view('index');
});


Route::get('/books', 'BooksController@index');

Route::get('/books/create', 'BooksController@create');

Route::post('/books', 'BooksController@store');

Route::get('/books/search', 'BooksController@search');

Route::get('/books/recent', 'BooksController@recent');

Route::get('/books/reviews', 'MyBooksController@reviews');

Route::get('/books/{book}', 'BooksController@show');



Route::get('/mybooks', 'MyBooksController@index');

Route::get('/mybooks/status', 'MyBooksController@store');

Route::get('/mybooks/{status}', 'MyBooksController@show');



Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionController@create');

Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');


