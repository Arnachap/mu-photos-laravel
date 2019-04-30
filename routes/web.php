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
Route::get('/', 'PagesController@index')->name('index');
Route::get('a-propos', 'PagesController@about')->name('about');
Route::get('contact', 'PagesController@contact')->name('contact');
Route::get('prestations', 'PagesController@prestations')->name('prestations');
Route::get('connexion', 'PagesController@login')->name('connexion');
Route::get('register', 'PagesController@register');
Route::resource('albums', 'AlbumsController')->except('index');

// Album category pages
Route::get('galerie/{category}', 'AlbumsController@category')->name('galerie');

// Clients routes
Auth::routes();
Route::get('client', 'ClientController@index')->middleware('auth')->name('client');

// Admin routes
Route::get('mu', 'AdminController@index')->middleware('admin')->name('admin');
