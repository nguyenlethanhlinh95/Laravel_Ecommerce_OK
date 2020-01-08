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
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/shop.html', 'HomeController@index')->name('shop');
Route::get('/contact.html', 'HomeController@contact')->name('contact');
Route::get('/product-detail/{name}.{id}.html', 'HomeController@productDetail')->name('product_view_detail');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/**
 * Cart Route
 */
Route::get('/cart.html','CartController@index' )->name('cart');
Route::get('/cart/addItem/{id}.html', 'CartController@addItem')->name('addItemCart');
Route::get('/cart/removeItem/{id}.html', 'CartController@destroy')->name('removeItemCart');
Route::post('/cart/updateItem.html', 'CartController@update')->name('updateItemCart');

//CheckOut Route
Route::group(['middleware' => 'auth'], function() {
    Route::get('/checkout.html', 'CheckoutController@index')->name('checkout');
    Route::post('/formvalidate.html', 'CheckoutController@addressValidate')->name('checkout.addressValidate');
    Route::get('/profile.html', 'ProfileController@index')->name('profile.index');
    Route::get('/orders.html', 'ProfileController@orders')->name('profile.orders');
    Route::get('/address.html', 'ProfileController@address')->name('profile.address');
    Route::get('/thankyou.html', 'ProfileController@thankyou')->name('profile.thankyou');
    Route::post('/updateAddress.html', 'ProfileController@UpdateAddress')->name('profile.address_post');
    Route::get('/password.html', 'ProfileController@password')->name('profile.password_get');
    Route::post('/updatePassword.html', 'ProfileController@updatePassword')->name('profile.password_post');

    Route::post('/addToWishList.html', 'HomeController@addToWishList')->name('addToWishList');
    Route::get('/removeWishList/{id}.html', 'HomeController@destroyWishlist')->name('removeWishlist');

    Route::get('/wishlist.html', 'HomeController@viewWishList')->name('view_wishList');
    Route::post('testAjax', 'ProductsController@testAjax')->name('testAjax');
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
        //Route::get('/print_product', '')
        Route::resource('product', 'ProductsController');
        Route::resource('attribute', 'AttributesController');

        Route::get('item-attribute/{id}', 'ItemsAttributesController@list_add')->name('items_list_attributes');
        Route::resource('ItemsAttribute', 'ItemsAttributesController');
        Route::resource('category', 'CategoriesController');
        Route::resource('page', 'PageController');
        Route::resource('post', 'PostsController');
        Route::resource('category-product', 'CategoryProductController');
    });