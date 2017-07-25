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
Route::get('/image/{filename}', 'ImageController@show')->name('image.show');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index'); // Show the application home page.
Route::get('/about_us', 'AboutUsController@index')->name('about_us.index'); // Show about_us page.
Route::get('/service', 'ServiceController@index')->name('service.index'); // Show service page.
Route::get('/blog', 'BlogController@index')->name('blog.index'); // Show blog page.

Route::group(['middleware' => ['auth', 'administrator']], function () {
    Route::post('/blog/store', 'BlogController@store')->name('blog.store'); // Store a newly created blog in storage.
    Route::get('/blog/edit/{blog}', 'BlogController@edit')->name('blog.edit'); // Show the form for editing the specified blog.
    Route::get('/blog/create', 'BlogController@create')->name('blog.create'); // Show the page for creating a new blog.
    Route::put('/blog/{blog}', 'BlogController@update')->name('blog.update'); // Update the specified blog in storage.
    Route::delete('/blog/{blog}', 'BlogController@destroy')->name('blog.destroy'); // Remove the specified blog from storage.


    Route::post('/image/store', 'ImageController@store')->name('image.store'); // Store a newly created image in storage/app/image

});

Route::get('/blog/{blog}', 'BlogController@show')->name('blog.show'); // Display the specified blog.
