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

// Main pages
Route::get('/', 'PagesController@index');
Route::get('a-propos', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('prestations', 'PagesController@prestations');
Route::get('connexion', 'PagesController@login');
Route::resource('albums', 'AlbumsController')->except('index');

// Album category pages
Route::get('galerie/{category}', 'AlbumsController@category');

Auth::routes();
Route::get('client', 'ClientController@index');
