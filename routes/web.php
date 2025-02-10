<?php

use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\admin\AddProductController;
use App\Http\Controllers\admin\ShopsController;
use App\Http\Controllers\admin\ViewOrderController as AdminViewOrderController;
use App\Http\Controllers\admin\ViewProductController as AdminViewProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ChildernController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\ShoesController;
use App\Http\Controllers\ShopingCartController;
use App\Http\Controllers\store\AddProductsController;
use App\Http\Controllers\store\DeleteProductController;
use App\Http\Controllers\store\UpdateProductController;
use App\Http\Controllers\store\ViewOrderController;
use App\Http\Controllers\store\ViewProductController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\WomenController;

Route::get('/deleting-product-cart{id}', [ShopingCartController::class, 'deletingProductCart'])->name('deletingProductCart');
Route::get('/deleting-product-wishlist{id}', [WishlistController::class, 'deletingProductWishlist'])->name('deletingProductWishlist');

Route::middleware('isAdmin')->group(function(){
// admin routes
Route::get('/admin-dashboard' , function(){
    return view('admin.index');
});
Route::get('/admin-add-products'  , [AddProductController::class , 'showProducts'] )->name('admin-add-products');
Route::post('/admin-add-products-data' , [AddProductController::class , 'addProducts'])->name('admin-add-products-data');
Route::post('/admin-add-category-data' , [AddProductController::class , 'addCategory'])->name('admin-add-category-data');
Route::get('/admin-view-products' , [AdminViewProductController::class, 'showSubCategory'])->name('admin-view-products');
Route::get('/admin-deleting-product{id}' , [AdminViewProductController::class, 'deletingProduct'])->name('admin-deleting-product');
Route::get('/admin-view-orders' ,[AdminViewOrderController::class , 'showOrders'] )->name('admin-view-orders');
Route::get('/admin-add-shops' , [ShopsController::class , 'addShops'])->name('admin-add-shops');
Route::post('admin-add-shops-data' , [ShopsController::class , 'addShopData'])->name('admin-add-shops-data');
Route::get('/admin-view-shops' , [ShopsController::class , 'viewShops'])->name('admin-view-shops');
});

Route::middleware('NonValidUser')->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    // store panel routes
    Route::get('/dashboard', function () {
        return view('store.index');
    })->name('dashboard');
    Route::get('/add-products', [AddProductsController::class, 'show_product_categories_size'])->name('add-products');
    Route::get('/view-products', [ViewProductController::class, 'showProducts'])->name('view-products');
    Route::get('/view-orders', [ViewOrderController::class, 'showOrders'])->name('view-orders');
    Route::post('upload-products', [AddProductsController::class, 'saveProducts'])->name('upload-products');
    Route::get('/select-products{id}', [AddProductsController::class, 'selectProducts'])->name('select-products');
    Route::get('/deleting-product{id}', [DeleteProductController::class, 'deleteProduct'])->name('deleting-product');
    Route::get('/update-product{id}', [UpdateProductController::class, 'updateProduct'])->name('update-product');
    Route::post('/updating-productData', [UpdateProductController::class, 'updatingProduct'])->name('updating-productData');
});

Route::middleware('ValidUser')->group(function () {
    Route::get('/register', [RegistrationController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/register-data', [RegistrationController::class, 'registerData'])->name('register-data');
    Route::post('/register-shopkeeperData', [RegistrationController::class, 'registerShopkeeprData'])->name('register-shopkeeperData');
    Route::post('/search-shop', [RegistrationController::class, 'searchShop'])->name('search-shop');
    Route::post('/login-data', [LoginController::class, 'loginData'])->name('login-data');
});

Route::middleware('isSeller')->group(function () {
    // store panel routes
    Route::get('/dashboard', function () {
        return view('store.index');
    })->name('dashboard');
    Route::get('/add-products', [AddProductsController::class, 'show_product_categories_size'])->name('add-products');
    Route::get('/view-products', [ViewProductController::class, 'showProducts'])->name('view-products');
    Route::get('/view-orders', [ViewOrderController::class, 'showOrders'])->name('view-orders');
    Route::post('upload-products', [AddProductsController::class, 'saveProducts'])->name('upload-products');
    Route::get('/select-products{id}', [AddProductsController::class, 'selectProducts'])->name('select-products');
    Route::get('/deleting-product{id}', [DeleteProductController::class, 'deleteProduct'])->name('deleting-product');
    Route::get('/update-product{id}', [UpdateProductController::class, 'updateProduct'])->name('update-product');
    Route::post('/updating-productData', [UpdateProductController::class, 'updatingProduct'])->name('updating-productData');
    Route::get('/orders-status/{status}/{order_id}/{user_id}' , [ViewOrderController::class , 'updateStatus']  )->name('order-status');
});

Route::middleware('isCustomer')->group(function () {

    // Customer panel routes

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/women', [WomenController::class, 'showAllProducts'])->name('women');
    Route::get('/men', [MenController::class, 'showAllProducts'])->name('men');
    Route::get('/childern', [ChildernController::class, 'showAllProducts'])->name('childern');
    Route::get('/shoes', [ShoesController::class, 'showAllProducts'])->name('shoes');
    Route::get('/accessories', [AccessoriesController::class, 'showAllProducts'])->name('accessories');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/shopping-wishlist', [WishlistController::class, 'showProducts'])->name('shopping-wishlist');
    Route::get('/shoping-cart', [ShopingCartController::class, 'showProducts'])->name('shopping-cart');
    Route::get('/adding-product-cart{id}', [ShopingCartController::class, 'addingProductCart'])->name('addingProductCart');
    Route::get('/adding-product-wishlist{id}', [WishlistController::class, 'addingProductWishlist'])->name('addingProductWishlist');
    Route::get('/products-details{id}', [ProductDetailsController::class, 'showProductDetails'])->name('products-details');
    Route::get('/sub-categories{id}', [SubCategoriesController::class, 'showAllProducts'])->name('sub-categories');
    Route::post('/searching-product', [SearchProductController::class, 'searchProduct'])->name('searching-product');
});

Route::middleware('Checkout')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'showOrderSummary'])->name('checkout');
    Route::post('/proceed-checkout', [CheckoutController::class, 'storeCheckout'])->name('proceed-checkout');
    Route::post('/order', [OrderController::class, 'orderProduct'])->name('order');
});
