<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FilaManagerController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\ColorController;
use App\Http\Controllers\Product\MainCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\PublicationController;
use App\Http\Controllers\Product\SizeController;
use App\Http\Controllers\Product\SubCategoryController;
use App\Http\Controllers\Product\UnitController;
use App\Http\Controllers\Product\VendorController;
use App\Http\Controllers\Product\WriterControlller;
use App\Http\Controllers\WebsiteController;
use App\Models\Publication;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [WebsiteController::class, 'index'])->name('website_index');
Route::get('/products', [WebsiteController::class, 'products'])->name('website_products');
Route::get('/products-details/{product}', [WebsiteController::class, 'product_details'])->name('website_product_details');
Route::get('/carts', [WebsiteController::class, 'cart'])->name('website_product_cart');
Route::get('/check-out', [WebsiteController::class, 'checkout'])->name('website_checkout')->middleware('auth');
Route::post('/checkout-confirm',[WebsiteController::class,'CheckoutConfirm'])->name('checkout_confirms');
Route::get('/wish-list', [WebsiteController::class, 'wishlist'])->name('website_wishlist');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('website_contact');
Route::get('/learn-vue', [WebsiteController::class, 'vue'])->name('website_vue');

Route::post('save_check_out_info',[CheckOutController::class,'check_out_info'])->name('save_check_out_info')->middleware('auth');
Route::get('/get_latest_check_out_info',[CheckOutController::class,'latest_check_out_info'])->name('get_latest_check_out_info')->middleware('auth');

Route::get('/checkout_success',[WebsiteController::class,'CheckOutSuccess'])->name('checkout_success')->middleware('auth');
Route::get('/checkout_fail',function(){dd('fail');})->name('checkout_fail');


Route::group([
    'prefix' => 'json',
], function () {

    Route::get('/get-min-max-price', 'WebsiteController@get_min_max_price_json')->name('product_get_min_max_price_json');
    Route::get('/get-all-category', 'WebsiteController@get_all_category_json')->name('product_get_all_category_json');

    // Route::get('/products/category/{main_category}/all-product-json', 'WebsiteController@main_category_products_json')->name('website_main_category_products_json');
    // Route::get('/category-products-json/{main_category_id}/{category_id}', 'WebsiteController@category_product_json')->name('product_category_product_json');


    Route::get('/latest-products-json', [WebsiteController::class,'latest_product_json'])->name('product_latest_product_json');
    Route::get('/search-products-json/{limit}/{key}', [WebsiteController::class,'search_product_json'])->name('search_latest_product_json');
    Route::get('/show-product-json/{product}', 'WebsiteController@show_product_json')->name('product_show_product_json');
    Route::get('/get-product-related-info-json/{product}', 'WebsiteController@get_product_related_info_json')->name('product_get_product_related_info_json');

});
Route::group([
    'prefix' => 'blank',
    'middleware' => ['auth']
], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin_index');
    Route::get('/index', [AdminController::class, 'blade_index'])->name('admin_blade_index');
    Route::get('/create', [AdminController::class, 'blade_create'])->name('admin_blade_create');
    Route::get('/view', [AdminController::class, 'blade_view'])->name('admin_blade_view');
});


Route::group([
    'prefix' => 'user',
    'middleware' => ['auth','check_user_is_active','super_admin']
], function () {

    Route::get('/index', [UserController::class, 'index'])->name('admin_user_index');
    Route::get('/view/{id}', [UserController::class, 'view'])->name('admin_user_view');
    Route::get('/create', [UserController::class, 'create'])->name('admin_user_create');
    Route::post('/store', [UserController::class, 'store'])->name('admin_user_store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin_user_edit');
    Route::post('/update', [UserController::class, 'update'])->name('admin_user_update');
    Route::post('/delete', [UserController::class, 'delete'])->name('admin_user_delete');
    
});

Route::group([
    'prefix' => 'user-role',
    'middleware' => ['auth','check_user_is_active','super_admin']
], function () {

    Route::get('/index', [UserRoleController::class, 'index'])->name('admin_user_role_index');
    Route::get('/view/{id}', [UserRoleController::class, 'view'])->name('admin_user_role_view');
    Route::get('/create', [UserRoleController::class, 'create'])->name('admin_user_role_create');
    Route::post('/store', [UserRoleController::class, 'store'])->name('admin_user_role_store');
    Route::get('/edit', [UserRoleController::class, 'edit'])->name('admin_user_role_edit');
    Route::post('/update', [UserRoleController::class, 'update'])->name('admin_user_role_update');
    Route::post('/delete', [UserRoleController::class, 'delete'])->name('admin_user_role_delete');
    
});
Route::group([
    'prefix' => 'file-manager',
    'middleware' => ['auth'],
    'namespace' => 'Admin'
], function () {

    Route::post('/store-file', [FilaManagerController::class,'store_file'])->name('admin_fm_store_file');
    Route::get('/get-files', [FilaManagerController::class,'get_files'])->name('admin_fm_get_files');
    Route::delete('/delete-file/{image}', [FilaManagerController::class,'delete_file'])->name('admin_fm_delete_file');
});

Route::group([
    'prefix' => 'admin/product',
    'middleware' => ['auth']
], function () {

    Route::resource('product',ProductController::class);
    Route::resource('writer',WriterControlller::class); 
    Route::resource('publication',PublicationController::class);
    Route::resource('vendor',VendorController::class);

    // Route::get('/index', [ProductController::class, 'index'])->name('admin_product_index');
    // Route::get('/add-product', [ProductController::class, 'create'])->name('admin_product_create');
    // Route::get('/show', [ProductController::class, 'show'])->name('admin_product_view');

    Route::resource('brand', BrandController::class);
    Route::resource('Main-category', MainCategoryController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('sub-category', SubCategoryController::class);
    Route::resource('color', ColorController::class);
    Route::resource('size', SizeController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('status', StatusController::class);
    
   
    Route::get('/get-all-cateogory-selected-by-main-category/{main_category_id}', [CategoryController::class,'get_category_by_main_category'])->name('get_all_category_selected_by_main_category');
    
    Route::get('/get-all-sub-category-selected-by-category/{category_id}', [CategoryController::class,'get_sub_category_by_category'])->name('get-all-sub-category-selected-by-category');

    Route::get('/get-all-main-category-josn', [MainCategoryController::class,'get_main_category_json'])->name('get_main_category_json');
    Route::get('/get-all-category-josn', [CategoryController::class,'get_category_json'])->name('get_category_json');
   
});