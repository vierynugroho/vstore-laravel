<?php

use Illuminate\Support\Facades\Auth;
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

// Route::fallback(function () {
//     echo "<h1>Gaada Gan</h1>F
//     <h2>Cari Apa sih?</h2>
//     ";
// });

Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');
Route::get('/details/{id}', 'DetailsController@index')->name('detail');
Route::post('/details/{id}', 'DetailsController@add')->name('detail-add');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::post('/cart/{id}', 'CartController@delete')->name('cart-delete');
    Route::get('/success', 'CartController@success')->name('success');

    Route::post('/checkout', 'CheckoutController@process')->name('checkout');
    Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');
});

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::prefix('dashboard')->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::get('products', 'DashboardProductController@index')->name('dashboard-product');
        Route::get('products/create', 'DashboardProductController@create')->name('dashboard-product-create');
        Route::post('products', 'DashboardProductController@store')->name('dashboard-product-store');
        Route::get('products/{id}', 'DashboardProductController@details')->name('dashboard-product-details');
        Route::post('products/{id}', 'DashboardProductController@update')->name('dashboard-product-update');

        Route::post('products/gallery/upload', 'DashboardProductController@uploadGallery')->name('dashboard-product-gallery-upload');
        Route::get('products/gallery/delete/{id}', 'DashboardProductController@deleteGallery')->name('dashboard-product-gallery-delete');

        Route::get('transactions', 'DashboardTransactionsController@index')->name('dashboard-transactions');
        Route::get('transactions/{id}', 'DashboardTransactionsController@details')->name('dashboard-transactions-details');
        Route::post('transactions/{id}', 'DashboardTransactionsController@update')->name('dashboard-transactions-update');

        Route::get('settings', 'DashboardSettingsController@settings')->name('dashboard-settings-store');

        Route::get('account', 'DashboardSettingsController@account')->name('dashboard-settings-account');
        Route::post('account/{redirect}', 'DashboardSettingsController@update')->name('dashboard-settings-redirect');

        Route::resource('product', 'DashboardProductController');
    });

route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
    });

Auth::routes([
    'verify' => true,
]);