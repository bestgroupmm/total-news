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
//     return view('index');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles/{slug}','ArticleController@getArticleByCategory');

Route::get('/articles/{slug}/{article}','ArticleController@articleDetail');

// Route::get('/admin', 'backend\AdminDashboardController@index');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|editor']], function()
{

    Route::get('/', 'backend\AdminDashboardController@index');

    // Route::resource('/users', 'backend\AdminUserController');

    Route::group(['prefix' => '/users', 'middleware' => ['role:admin']], function() {
	    Route::get('/', ['middleware' => ['role:admin'], 'uses' => 'backend\AdminUserController@index']);
	    Route::get('/create', ['middleware' => ['role:admin'], 'uses' => 'backend\AdminUserController@create']);
	    Route::post('/', ['middleware' => ['role:admin'], 'uses' => 'backend\AdminUserController@store']);
	    Route::get('/{id}/edit', ['middleware' => ['role:admin'], 'uses' => 'backend\AdminUserController@edit']);
	    Route::put('/{id}', ['middleware' => ['role:admin'], 'uses' => 'backend\AdminUserController@update']);
	    Route::delete('/{id}', ['middleware' => ['role:admin'], 'uses' => 'backend\AdminUserController@destroy']);
	});

    Route::resource('/article-categories', 'backend\ArticleCategoryController');

    Route::resource('/articles', 'backend\ArticleController');

    Route::resource('/ads', 'backend\AdvertisingController');
    
    Route::resource('/social-links', 'backend\SocialLinkController');

});
