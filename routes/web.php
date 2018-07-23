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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');

Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{id}', 'NewsController@detail')->where('id', '[0-9]+')->name('admin.news.detail');

Route::get('/case', 'CasesController@index')->name('cases');
Route::get('case/{id}', 'CasesController@detail')->where('id', '[0-9]+')->name('admin.cases.detail');

Route::get('/product', 'ProductController@index')->name('product');

Route::get('/service', 'ServiceController@index')->name('service');

Route::get('/recruit', 'RecruitController@index')->name('recruit');

Auth::routes();

// pop indoor admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web']], function () {
    Route::get('/{index?}', 'AdminController@index')->where('index', 'index')->name('admin.index');
    Route::get('/home/banner', 'AdminController@banner')->name('admin.home.banner');
    // case
    Route::get('case/{index?}', 'CasesController@adminIndex')->where('index', 'index')->name('admin.cases.index');
    Route::match(['get', 'post'], 'case/create', 'CasesController@create')->name('admin.cases.create');
    Route::match(['get', 'post'], 'case/{id}/edit', 'CasesController@edit')->where(['id' => '[0-9]+'])->name('admin.cases.edit');

    // category
    Route::get('category/{index?}', 'CategoryController@adminIndex')->where('index', 'index')->name('admin.category.index');
    Route::match(['get', 'post'], 'category/create', 'CategoryController@create')->name('admin.category.create');
    Route::match(['get', 'post'], 'category/{id}/edit', 'CategoryController@edit')->where(['id' => '[0-9]+'])->name('admin.category.edit');

    // news
    Route::get('news/{index?}', 'NewsController@adminIndex')->where('index', 'index')->name('admin.news.index');
    Route::match(['get', 'post'], 'news/create', 'NewsController@create')->name('admin.news.create');
    Route::match(['get', 'post'], 'news/{id}/edit', 'NewsController@edit')->where(['id' => '[0-9]+'])->name('admin.news.edit');
    // product
    Route::get('product/{index?}', 'ProductController@adminIndex')->where('index', 'index')->name('admin.product.index');
    Route::match(['get', 'post'], 'product/create', 'ProductController@create')->name('admin.product.create');
     Route::match(['get', 'post'], 'product/{id}/edit', 'ProductController@edit')->where(['id' => '[0-9]+'])->name('admin.product.edit');

    // series
    Route::get('series/{index?}', 'SeriesController@adminIndex')->where('index', 'index')->name('admin.series.index');
    Route::match(['get', 'post'], 'series/create', 'SeriesController@create')->name('admin.series.create');
    Route::match(['get', 'post'], 'series/{id}/edit', 'SeriesController@edit')->where(['id' => '[0-9]+'])->name('admin.series.edit');

    // service
    Route::get('service/{index?}', 'ServiceController@adminIndex')->where('index', 'index')->name('admin.service.index');
    Route::match(['get', 'post'], 'service/create', 'ServiceController@create')->name('admin.service.create');
    Route::match(['get', 'post'], 'service/{id}/edit', 'ServiceController@edit')->where(['id' => '[0-9]+'])->name('admin.service.edit');

    // module
    Route::get('module/{index?}', 'ModuleController@adminIndex')->where('index', 'index')->name('admin.module.index');
    Route::match(['get', 'post'], 'module/create', 'ModuleController@create')->name('admin.module.create');
    Route::match(['get', 'post'], 'module/{id}/edit', 'ModuleController@edit')->where(['id' => '[0-9]+'])->name('admin.module.edit');

    // tag
    Route::get('tag/{index?}', 'TagController@adminIndex')->where('index', 'index')->name('admin.tag.index');
    Route::match(['get', 'post'], 'tag/create', 'TagController@create')->name('admin.tag.create');
    Route::match(['get', 'post'], 'tag/{id}/edit', 'TagController@edit')->where(['id' => '[0-9]+'])->name('admin.tag.edit');

});
