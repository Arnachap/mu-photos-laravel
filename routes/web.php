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
Route::get('galerie/{category}', 'PagesController@gallery')->name('galerie');
Route::resource('albums', 'GalleriesController')->except('index');

// Clients routes
Auth::routes();
Route::get('client', 'ClientController@index')->name('client');

// Admin routes
Route::get('admin', 'AdminController@dashboard')->name('admin');
Route::get('admin/galeries', 'AdminController@galleries');
