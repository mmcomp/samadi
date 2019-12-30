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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/**
 * Admin routes
 */
Route::namespace('Admin')->group(function () {
    Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'LoginController@login')->name('admin.login');
    Route::any('admin/forget', 'LoginController@forget')->name('admin.forget');
    Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');
});
Route::group(['prefix' => 'admin', /*'middleware' => ['employee'],*/ 'as' => 'admin.' ], function () {
    Route::namespace('Admin')->group(function () {
    Route::group([/*'middleware' => ['role:admin|superadmin|clerk, guard:employee']*/], function () {
            Route::any('/', 'DashboardController@index')->name('dashboard');
            Route::namespace('Products')->group(function () {
                Route::get('/products/bookmarks', 'ProductController@bookmarks')->name('product.bookmark');
                Route::get('/products/selled', 'ProductController@selled')->name('product.selled');
                Route::resource('products', 'ProductController');
                Route::get('remove-image-product', 'ProductController@removeImage')->name('product.remove.image');
                Route::get('remove-image-thumb', 'ProductController@removeThumbnail')->name('product.remove.thumb');
            });
            Route::namespace('Customers')->group(function () {
                Route::resource('customers', 'CustomerController');
                Route::resource('customers.addresses', 'CustomerAddressController');
            });
            Route::namespace('Offers')->group(function () {
                Route::resource('offers', 'OfferController');
                Route::any('offers.category', 'OfferController@category')->name('offers.category');
                Route::any('offers.category_create', 'OfferController@categoryCreate')->name('offers.category_create');
                Route::any('offers.category_store', 'OfferController@categoryStore')->name('offers.category_store');
                Route::any('offers.category_destroy', 'OfferController@categoryDestroy')->name('offers.category_destroy');
            });
            Route::namespace('Tickets')->group(function () {
                Route::resource('tickets', 'TicketController');
            });
            Route::namespace('News')->group(function () {
                Route::resource('news', 'NewsController');
            });
            Route::namespace('Slides')->group(function () {
                Route::resource('slides', 'SlideController');
            });
            Route::namespace('Transactions')->group(function () {
                Route::any('transactions.income', 'TransactionController@income')->name('transactions.income');
                Route::any('transactions.cash', 'TransactionController@cash')->name('transactions.cash');
            });
            Route::namespace('Categories')->group(function () {
                Route::resource('categories', 'CategoryController');
                Route::get('remove-image-category', 'CategoryController@removeImage')->name('category.remove.image');
            });
            Route::namespace('Orders')->group(function () {
                Route::resource('orders', 'OrderController');
                Route::resource('order-statuses', 'OrderStatusController');
                Route::get('orders/{id}/invoice', 'OrderController@generateInvoice')->name('orders.invoice.generate');
            });
            Route::resource('addresses', 'Addresses\AddressController');
            Route::resource('countries', 'Countries\CountryController');
            Route::resource('countries.provinces', 'Provinces\ProvinceController');
            Route::resource('countries.provinces.cities', 'Cities\CityController');
            Route::resource('couriers', 'Couriers\CourierController');
            Route::resource('attributes', 'Attributes\AttributeController');
            Route::resource('attributes.values', 'Attributes\AttributeValueController');
            Route::resource('brands', 'Brands\BrandController');

        });
        Route::group(['middleware' => ['role:admin|superadmin, guard:employee']], function () {
            Route::resource('employees', 'EmployeeController');
            Route::get('employees/{id}/profile', 'EmployeeController@getProfile')->name('employee.profile');
            Route::put('employees/{id}/profile', 'EmployeeController@updateProfile')->name('employee.profile.update');
            Route::resource('roles', 'Roles\RoleController');
            Route::resource('permissions', 'Permissions\PermissionController');
        });
    });
});

/**
 * Frontend routes
 */
Auth::routes();
Route::namespace('Auth')->group(function () {
    Route::get('cart/login', 'CartLoginController@showLoginForm')->name('cart.login');
    Route::post('cart/login', 'CartLoginController@login')->name('cart.login');
    Route::get('logout', 'LoginController@logout');
});

Route::namespace('Front')->group(function () {
    Route::get('/smsverify/{id}/{code}', 'HomeController@smsVeify')->name('smsverify');
    Route::get('/emailverify/{id}', 'HomeController@emailVeify')->name('emailverify');
    Route::get('/emailforget/{id}/{newpassword}', 'HomeController@emailForget')->name('emailforget');
    Route::get('/lang/{locale}', function (Request $request, $locale) {
        $request->session()->put('locale', $locale);
        if(app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName()=='splash') {
            return redirect('/home');
        }
        return redirect()->back();
    });
    Route::get('/', 'HomeController@splash')->name('splash');
    Route::any('/home', 'HomeController@index')->name('home');
    Route::any('/mail', 'HomeController@mail');
    Route::group(['middleware' => ['auth', 'web']], function () {

        Route::namespace('Payments')->group(function () {
            Route::get('bank-transfer', 'BankTransferController@index')->name('bank-transfer.index');
            Route::post('bank-transfer', 'BankTransferController@store')->name('bank-transfer.store');
        });

        Route::namespace('Addresses')->group(function () {
            Route::resource('country.state', 'CountryStateController');
            Route::resource('state.city', 'StateCityController');
        });

        Route::get('accounts', 'AccountsController@index')->name('accounts');
        Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
        Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
        Route::get('checkout/execute', 'CheckoutController@executePayPalPayment')->name('checkout.execute');
        Route::post('checkout/execute', 'CheckoutController@charge')->name('checkout.execute');
        Route::get('checkout/cancel', 'CheckoutController@cancel')->name('checkout.cancel');
        Route::get('checkout/success', 'CheckoutController@success')->name('checkout.success');
        Route::resource('customer.address', 'CustomerAddressController');
    });
    Route::resource('cart', 'CartController');
    Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
    Route::get("search", 'ProductController@search')->name('search.product');
    Route::get('about', 'HomeController@about')->name('about');
    Route::get('contact', 'HomeController@contact')->name('contact');
    Route::get('privacy', 'HomeController@contact')->name('privacy');
    Route::post("product/like", 'ProductController@like')->name('product.like');
    Route::post("product/bookmark", 'ProductController@bookmark')->name('product.bookmark');
    Route::get("product/{id}", 'ProductController@showId')->name('front.get.productid');
    // Route::get("{product}", 'ProductController@show')->name('front.get.product');
});