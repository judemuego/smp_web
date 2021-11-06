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
    return view('frontend.index');
});

Route::get('/admin', function () { return view('backend.master.index'); });
Route::get('/admin/testimonials', function () { return view('backend.pages.testimonials'); });
Route::get('/admin/website-maintenance', function () { return view('backend.pages.website.projects'); });



Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
});

Route::get('/{vue?}', function () { return view('frontend.index'); })->where('vue', '[\/\w\.-]*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
