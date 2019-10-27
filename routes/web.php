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

Route::get('/', 'IndexController@index');
Route::post('/search-input', 'SearchController@searchInput');
Route::post('/search-genre', 'SearchController@searchGenre');
Route::post('/search-name', 'SearchController@searchName');
Route::post('/search-date', 'SearchController@searchDate');
Route::post('/search-rating', 'SearchController@searchRating');
Route::get('/all-series', 'BrowseController@index');
Route::resource('/series','SeriesController');
Route::resource('/reviews','ReviewsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account-create', function(){return view('links.create_account');})->name('create.account');
Route::get('/account-login', function(){return view('links.login_account');})->name('login.account');

// User Routes
Route::group(['middleware' => 'auth','prefix' => 'user'], function(){
	Route::get('/my-account','User\DashboardController@index')->name('user.dashboard');
	Route::post('/profile','User\DashboardController@profile')->name('user.profile');
	Route::resource('/watchlist','User\WatchListController');
	Route::resource('/review','ReviewController');
	Route::get('/logout','User\DashboardController@logout')->name('user.logout');
});

// Admin Routes
Route::group(['middleware' => 'admin','prefix' => 'admin'], function(){
	Route::get('/dashboard','Admin\DashboardController@index')->name('admin.dashboard');
	Route::post('/profile-update','Admin\DashboardController@profileUpdate')->name('admin.profile');
	Route::get('/logout','Admin\DashboardController@logout')->name('admin.logout');
	Route::resource('/series','Admin\SeriesController');
	Route::resource('/genre','Admin\GenreController');
	Route::resource('/users','Admin\UsersController');
});