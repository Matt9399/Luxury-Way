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

// Début include

use App\Product;

// Fin include

Route::get('/', function () {
    return view('home');
});
/*
Route::get('/shop', function () {
    return view('shop.index');
});*/
Route::get('/shop', function () {
    $products = Product::all();
    return View::make("shop.index")->with("allProducts", $products);
})->name('shop');

Route::get('/add-to-cart/{id}', [
    'uses' => 'API\ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/del-to-cart/{id}', [
    'uses' => 'API\ProductController@getDelCart',
    'as' => 'product.delCart'
]);

Route::get('/del-to-cart2/{id}', [
    'uses' => 'ReservationController@getDelCart',
    'as' => 'reservation.delCart'
]);

Route::get('/shopping-cart', [
    'uses' => 'API\ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'API\ProductController@getCheckout',
    'as' => 'checkout'
]);

Route::post('/checkout', [
    'uses' => 'API\ProductController@postCheckout',
    'as' => 'checkout'
]);

Route::prefix('course')->group(function(){
    Route::get('/', function () {
        return view('course.index');
    });
    Route::get('/info', function () {
        return view('course.info');
    });
    Route::post('/', 'ReservationController@suiteInfo');
    Route::post('/info', 'ReservationController@store');
    Route::get('/add-to-cart/{id_utilisateur}', [
        'uses' => 'ReservationController@getAddToCart',
        'as' => 'reservation.addToCart'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/connexion', 'ConnexionController@formulaire');
//Route::post('/connexion', 'ConnexionController@traitement');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
//Route::get('{path}',"AdminController@index")->where( 'path', '([A-z\d-\/_.]+)?' );

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});



