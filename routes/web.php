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
Route::get('/', 'PagesController@index');
Route::get('/a-propos', 'PagesController@about');
Route::get('prestations', 'PrestationsController@show');
Route::get('galerie/{category}', 'AlbumsController@category');

// Contact form
Route::get('contact', 'ContactFormController@create');
Route::post('contact', 'ContactFormController@store');

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
    Route::post('sort-photos', 'PhotosController@sort');
    Route::resource('albums', 'AlbumsController')->except('index');
    Route::get('edit-category/{id}', 'AlbumsController@editCategory');
    Route::put('update-category/{id}', 'AlbumsController@updateCategory');
    Route::get('/edit-albums-order/{id}', 'AlbumsController@editAlbumsOrder');
    Route::post('/save-albums-order', 'AlbumsController@saveAlbumsOrder');
    // Admin clients albums routes
    Route::get('/admin/clients', 'AdminController@clients');
    Route::get('photos-clients/{id}', 'PrivatePhotosController@index');
    Route::post('photos-clients', 'PrivatePhotosController@addPhotos');
    Route::post('sort-photos-clients', 'PrivatePhotosController@sort');
    Route::post('archive-clients', 'PrivatePhotosController@addArchive');
    Route::delete('photos-clients/{id}', 'PrivatePhotosController@destroy');
    Route::resource('albums-clients', 'PrivateAlbumsController');
    // Admin slider routes
    Route::resource('slider', 'SliderController')->except(['create', 'show', 'edit']);
    Route::post('sort', 'SliderController@sort');
    // Admin testimonial route
    Route::resource('temoignages', 'TestimonialsController')->except(['show']);
    // Admin prestations routes
    Route::get('/admin/prestations', 'PrestationsController@index');
    Route::get('/prestations/{id}/edit', 'PrestationsController@edit');
    Route::put('/prestation/{id}/update', 'PrestationsController@update');
    // About
    Route::get('/about', 'AboutController@edit');
    Route::put('/about', 'AboutController@update');

// Clients Routes
Route::get('clients', 'ClientsController@index')->name('clients');