<?php

use App\Http\Controllers\Admin\AdminController;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $products = Product::all();
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'products' => $products
    ]);
})->name('home');

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {


    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }else{
             return redirect()->route('user.dashboard');
        }
    })->name('app.dashboard');

    Route::get('/media/{product_id}', [ProductController::class,'getOneProduct'])->name('media');

    Route::get('/create-checkout-session',[ProductController::class,'createCheckoutSession']);

    Route::get('/success-checkout-session',function (Request $request) {
        dd('ok');
    })->name('checkout.success');
    Route::get('/abort-checkout-session',function () {
        dd('annuler');
    })->name('checkout.cancel');



    Route::get('/user/dashboard',function () {
        return Inertia::render('Dashboard');
    })->name('user.dashboard');



    //admin
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/product',[AdminController::class,'listProduct'])->name('admin.allproduct');
    Route::post('/admin/create-product',[AdminController::class,'create'])->name('admin.store.product');
});
