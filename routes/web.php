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

// Authentication Routes
Route::get('connexion', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('connexion', ['as' => '', 'uses' => 'Auth\LoginController@login']);

// Registration Routes
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => '', 'uses' => 'Auth\RegisterController@register']);

// Admin Routes
Route::get('admin', 'AdminController@dashboard');
    // Admin public albums routes
    Route::get('admin/albums', 'AdminController@albums');
    Route::get('photos/{id}', 'PhotosController@index');
    Route::post('photos', 'PhotosController@addPhotos');
    Route::delete('photos/{id}', 'PhotosController@destroy');
    Route::resource('albums', 'AlbumsController')->except('index');
    // Admin clients albums routes
    Route::get('/admin/clients', 'AdminController@clients');
    Route::get('photos-clients/{id}', 'PrivatePhotosController@index');
    Route::post('photos-clients', 'PrivatePhotosController@addPhotos');
    Route::post('archive-clients', 'PrivatePhotosController@addArchive');
    Route::delete('photos-clients/{id}', 'PrivatePhotosController@destroy');
    Route::resource('albums-clients', 'PrivateAlbumsController');

// Clients Routes
Route::get('clients', 'ClientsController@index')->name('clients');
