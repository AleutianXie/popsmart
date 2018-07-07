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


    Route::get('product/{index?}', 'ProductController@adminIndex')->where('index', 'index')->name('admin.product.index');
    Route::match(['get', 'post'], 'product/create', 'ProductController@create')->name('admin.product.create');
    Route::get('product/{id}', 'ProductController@adminDetail')->where('id', '[0-9]+')->name('admin.product.detail');
    Route::get('resumes', 'ResumeController@search')->name('resume.search');
    Route::match(['get', 'post'], '/edit', 'ResumeController@edit');
    Route::post('/my/add/{id}', 'ResumeController@addmy')->where(['id' => '[0-9]+'])->name('resume.addmy');
    Route::get('/jobmodal/{id}', 'ResumeController@jobmodal')->where('id', '[0-9]+')->name('resume.jobmodal');
    Route::post('/job/add/', 'ResumeController@addjob')->name('resume.addjob');
    //Route::get('/search/{type}', 'ResumeController@search')->where(['type' => 'my|all|job'])->name('resume.search');
    Route::post('/feedback', 'FeedbackController@add');

    // customer

    Route::get('customer/search', 'CustomerController@search')->name('customer.search');

    // job

    Route::get('job/search', 'JobController@search')->name('job.search');
});
