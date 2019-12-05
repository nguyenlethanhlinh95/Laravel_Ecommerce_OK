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



Auth::routes();
/*
 * Route page
 * */
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@index')->name('shop');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/product-detail/{name}-{id}', 'HomeController@productDetail')->name('product_view_detail');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/**
 * Cart Route
 */
Route::get('/cart','CartController@index' )->name('cart');
Route::get('/cart/addItem/{id}', 'CartController@addItem')->name('addItemCart');
Route::get('/cart/removeItem/{id}', 'CartController@destroy')->name('removeItemCart');
Route::post('/cart/updateItem', 'CartController@update')->name('updateItemCart');

//CheckOut Route
Route::group(['middleware' => 'auth'], function() {
    Route::get('/checkout', 'CheckoutController@index')->name('checkout');
    Route::post('/formvalidate', 'CheckoutController@addressValidate')->name('checkout.addressValidate');
//    Route::get('/orders', 'ProfileController@orders');
//    Route::get('/address', 'ProfileController@address');
//    Route::post('/updateAddress', 'ProfileController@UpdateAddress');
//    Route::get('/password', 'ProfileController@Password');
//    Route::post('/updatePassword', 'ProfileController@updatePassword');
//    Route::get('/profile', function() {
//        return view('profile.index');
//    });
//    Route::get('/thankyou', function() {
//        return view('profile.thankyou');
//    });
});
/**
 * Cart Route
 */
// admin
Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'admin']],
    function ()
    {
        Route::get('/', function ()
        {
            return view('admin.index');
        })->name('admin.index');

        Route::resource('product', 'ProductsController');
        Route::resource('category', 'CategoriesController');
        //Route::resource('new', 'NewsController');
        Route::resource('post', 'PostsController');
        Route::resource('category-product', 'CategoryProductController');
    });