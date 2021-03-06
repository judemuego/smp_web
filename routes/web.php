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
Route::get('/admin/website-maintenance', function () { return view('backend.pages.website.projects'); });



Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/admin/testimonial'], function (){
    Route::get          ('/',                            'TestimonialsController@index'                          )->name('selection');
    Route::post         ('/save',                        'TestimonialsController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'TestimonialsController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'TestimonialsController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'TestimonialsController@destroy'                        )->name('reason_update');
    Route::post         ('/testimonialdata',             'TestimonialsController@index_i'                        )->name('reason');
});

Route::group(['prefix' => '/admin/project'], function (){
    Route::get          ('/',                            'ProjectsController@index'                          )->name('selection');
    Route::post         ('/save',                        'ProjectsController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'ProjectsController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'ProjectsController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'ProjectsController@destroy'                        )->name('reason_update');
    Route::post         ('/projectdata',                 'ProjectsController@index_i'                        )->name('reason');

});

Route::group(['prefix' => '/admin/projectcategory'], function (){
    Route::get          ('/',                            'ProjectCategoriesController@index'                          )->name('selection');
    Route::post         ('/save',                        'ProjectCategoriesController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'ProjectCategoriesController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'ProjectCategoriesController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'ProjectCategoriesController@destroy'                        )->name('reason_update');
    Route::post         ('/categorydata',                'ProjectCategoriesController@index_i'                )->name('reason');

});

Route::group(['prefix' => '/admin/faq'], function (){
    Route::get          ('/',                            'FaqsController@index'                          )->name('selection');
    Route::post         ('/save',                        'FaqsController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'FaqsController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'FaqsController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'FaqsController@destroy'                        )->name('reason_update');
    Route::post         ('/faqdata',                     'FaqsController@index_i'                        )->name('reason');
});

Route::group(['prefix' => '/admin/salesteam'], function (){
    Route::get          ('/',                            'SalesController@index'                          )->name('selection');
    Route::post         ('/save',                        'SalesController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'SalesController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'SalesController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'SalesController@destroy'                        )->name('reason_update');
    Route::post         ('/salesdata',                   'SalesController@index_i'                        )->name('reason');
});

Route::get('/{vue?}', function () { return view('frontend.index'); })->where('vue', '[\/\w\.-]*');
