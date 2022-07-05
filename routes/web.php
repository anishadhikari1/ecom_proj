<?php

use App\Http\Controllers\Cartcontroller;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Models\Product;
use Illuminate\Auth\Events\Logout;
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

Route::get('/', function () {
    return view('front.home');
});

// Route::get('/home',function() {
//     return view ('front.home');
// });
Route::get('home',[HomeController::class,'index'])->name('home');

Route::get('/shop',[HomeController::class, "shop"]);
Route::get('/contact',[HomeController::class, "contact"])->name('contactus');


Route::post('product_details/addToWishList',[HomeController::class,'wishlist'])->name('AddToWishList');
Route::get('/WishList',[HomeController::class,'view_wishList']);
Route::get('removeWishList/{id}',[HomeController::class,'removeWishList']);


Route::get('/products',function() {
    return view('front.shop');
});

Route::get('/product_details/{id}',[HomeController::class,'product_details']);




Route::group(['prefix' => 'admin', 'middleware'=>['auth','admin']], function(){
 
    Route::get('/',function(){
        return view('admin.index');
    })->name('admin.index');

    Route::post('product/store',[ProductsController::class,'store'])->name('product.store');

    Route::get('/admin',[HomeController::class,'index']);

    Route::get('/product/create',[ProductsController::class,'create'])->name('product.create');
    Route::get('/product/delete',[ProductsController::class,'destory'])->name('product.destroy');

    Route::get('/product',[ProductsController::class,'index'])->name('product.index');

    Route::get('/category',[CategoriesController::class,'index'])->name('category.index');
    Route::post('/category/store',[CategoriesController::class,'store'])->name('category.store');
    Route::get('/category/show/{id}',[CategoriesController::class,'store'])->name('category.show');
    Route::get('/category/delete/{id}',[CategoriesController::class,'destroy'])->name('category.destroy');
    Route::get('ProductEditForm/{id}',[ProductsController::class,'ProductEditForm'])->name('ProductEditForm');
    Route::get('product/product/delete/{id}',[ProductsController::class,'destroy']);

    Route::post('ProductEditForm/editProduct/{id}',[ProductsController::class,'editProducts'])->name("editProduct");
    Route::get('EditImage/{id}',[ProductsController::class,'ImageEditForm'])->name('ImageEditForm');
    Route::post('EditImage/editProImage/{id}',[ProductsController::class,'editProImage'])->name('editProImage');


Route::get('/addProperty/{id}',[ProductsController::class,'addProperty'])->name('addProperty');

   Route::post('/addProperty/submitProperty/{id}',[ProductsController::class,'submitProperty'])->name('submitProperty');
   Route::get('addSale',[ProductsController::class,'addSale']);

});


Route::get('/cart/addItem/{id}',[Cartcontroller::class,'addItem']);

Route::get('/cart',[Cartcontroller::class,'index']);

Route::get('cart/remove/{id}',[Cartcontroller::class,'destory']);

Route::put('cart/update/{id}',[Cartcontroller::class,'update']);

Route::get('logout',[LogoutController::class,'perform']);

Route::get('selectSize',[HomeController::class,'SelectSize']);
Route::get('newArrival',[HomeController::class,'newArrival']);

Route::post('addReview',[HomeController::class,'addReview']);

Route::post('search',[HomeController::class,'search']);

// checkout
Route::group(['middleware'=>'auth'], function(){
    Route::get('/checkout',[CheckoutController::class,'index']);
    Route::post('/formvalidate', [CheckoutController::class, 'formvalidate']);
    Route::get('/orders', [ProfileController::class,'orders']);
    Route::get('address',[ProfileController::class,'address']);
    Route::post('/password',[ProfileController::class,'updatePassword']);
    Route::get('/thankyou', function()
    {
       return view('/profile.thankyou'); 
    });

    Route::get('/profile', function() {
        return view('profile.index');
    });
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

   
});
