<?php


Route::get('/', function () {

    return view('welcome');
});

Route::get('admin/home','backEnd\Home@index');

Route::namespace('backEnd')->prefix('admin')->group(function () {
    // Controllers Within The 'App\Http\Controllers\Admin' Namespace
    Route::get('home', 'Home@index')->name('admin.home');
    Route::resource('users', 'Users')->except(['show', 'delete']);
    Route::resource('categories', 'Categories')->except(['show', 'delete']);
    Route::resource('skills', 'Skills')->except(['show', 'delete']);
    Route::resource('tags', 'Tags')->except(['show', 'delete']);
    Route::resource('pages', 'Pages')->except(['show', 'delete']);
    Route::resource('videos', 'Videos')->except(['show', 'delete']);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
