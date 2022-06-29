<?php

use App\Http\Controllers\HomeController;
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


Route::get('/product',function() {
    return view('front.shop');
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
