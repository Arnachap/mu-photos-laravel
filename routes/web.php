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

// Public Routes
Route::view('/', 'pages.index');
Route::view('a-propos', 'pages.about');
Route::view('contact', 'pages.contact');
Route::view('prestations', 'pages.prestations');
Route::get('galerie/{category}', 'AlbumsController@category');
Route::resource('albums', 'AlbumsController')->except('index');

// Authentication Routes
Route::get('connexion', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('connexion', ['as' => '', 'uses' => 'Auth\LoginController@login']);

// Registration Routes
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => '', 'uses' => 'Auth\RegisterController@register']);

// Admin Routes
Route::get('admin', 'AdminController@dashboard');
Route::get('admin/albums', 'AdminController@albums');

// Clients Routes
Route::get('clients', 'ClientsController@index')->name('clients');
