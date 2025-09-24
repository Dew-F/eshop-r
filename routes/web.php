<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
	Route::group([], function () {
		Route::get('home', 'HomeController@showProducts')->name('home.showProducts');
		Route::redirect('/', 'home');
		Route::get('search', 'HomeController@search')->name('home.search');
		Route::get('subcategory', 'SubcategoryController@show')->name('subcategory.show');
		Route::get('product', 'ProductController@show')->name('product.show');
		Route::post('addtocart', 'CartController@addToCart')->name('cart.addToCart');
		Route::get('cart', 'CartController@show')->name('cart.show');
		Route::post('cart/countchange', 'CartController@countChange')->name('cart.countChange');
		Route::post('cart/delete', 'CartController@deleteProduct')->name('cart.deleteProduct');
		Route::post('cart/clear', 'CartController@clear')->name('cart.clear');
		Route::get('rules', 'MainController@showRules')->name('rules');
		Route::get('privacy', 'MainController@showPolitic')->name('politic');
		Route::get('about', 'MainController@showAbout')->name('about');
		Route::post('orderdetails', 'OrderController@showSettings')->name('order.showSettings');
		Route::post('order/buy', 'OrderController@buy')->name('order.buy');Route::get('about', 'MainController@showAbout')->name('about');
		Route::get('compare', 'CompareController@show')->name('compare');
		Route::post('compare/add', 'CompareController@add')->name('compare.add');
		Route::post('compare/del', 'CompareController@del')->name('compare.del');
	});

	Route::group(['middleware' => ['guest']], function () {
		Route::get('auth', 'AuthController@show')->name('auth.show');
		Route::post('auth/authentication', 'AuthController@authentication')->name('auth.authentication');

		Route::get('/register', 'RegisterController@show')->name('reg.show');
		Route::post('/register/create', 'RegisterController@create')->name('reg.create');
	});

	Route::group(['middleware' => ['auth']], function () {
		Route::get('profile', 'UserController')->name('profile');
		Route::get('logout', 'LogoutController@logout')->name('logout');
		Route::get('order', 'OrderController@show')->name('order.show');
		Route::get('favourites', 'FavouritesController@show')->name('fav.show');
		Route::post('addtofav', 'FavouritesController@addToFav')->name('fav.addToFav');
		Route::post('delfav', 'FavouritesController@delFav')->name('fav.delFav');
		Route::get('history', 'HistoryController@show')->name('history');
		Route::get('historydetails', 'HistoryController@details')->name('history.details');
	});

	Route::group(['middleware' => ['admin']], function () {
		Route::get('tables', 'AdminpanelController@tableItems')->name('tables');
		Route::get('edit', 'AdminpanelController@showEdit')->name('edit');
		Route::post('tabledel', 'AdminpanelController@del')->name('tabledel');
		Route::post('save', 'AdminpanelController@save')->name('save');
		Route::get('order', function () { return view('order'); })->name('order');
	});
});