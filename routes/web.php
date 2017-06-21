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
   return view('home'); 
});

Route::get('/about-us', function () {
   return view('about-us');
});

Route::get('/services', function () {
   return view('services');
});

//
//Route::get('/return-handling', function() {
//   return view('return-handling');
//});
//
//Route::get('/serviced-products', function() {
//   return view('serviced-products');
//});
//
//Route::get('/recover-value', function() {
//   return view('recover-value');
//});
//
//Route::get('/technicians', function() {
//   return view('technicians');
//});
//
//Route::get('/dropshipping', function() {
//    return view('dropshipping');
//});
//
//Route::get('/amazon-fba-prep', function() {
//    return view('amazon-fba-prep');
//});
//
//Route::get('/discounted-shipping', function() {
//   return view('discounted-shipping');
//});
//
//Route::get('/contact-us', function() {
//   return view('contact-us');
//});
