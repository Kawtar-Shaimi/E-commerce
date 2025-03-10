<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', [ProductController::class, 'index'])->name('products.index');


Route::get('/home', [HomeController::class, 'index'])->name('home');
/* Auth routes */
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::prefix('/')->middleware('auth')->group(function () {
    /* Logout route */
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    /* Home redirection route */
    Route::get('/',function(){
        if (Auth::user()->role === 'admin'){
            return redirect()->route('admins.index');
        }elseif(Auth::user()->role === 'client'){
            return redirect()->route('clients.index');
        }
        return redirect()->route('developers.index');
    })->name('home');
});
// Home route
Route::get('/', function (){
    return view('auth.verifyEmail');
});
Route::get('/login', function (){
    return view('auth.login');
});
Route::get('/register', function (){
    return view('auth.register');
});
Route::get('/affichage', function (){
    return view('client.index');
});
Route::get('/showproduct',function(){
    return view(view: 'client.showproduct');
});
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/products',function(){
    return view('product.index');
});
Route::get('/carts',function(){
    return view('product.cart');
});
Route::get('/checkout',function(){
    return view('product.checkout');
});
Route::get('/succes',function(){
    return view('product.succes');
});
Route::get('/payement',function(){
    return view('product.payement');
});
Route::get('/myproducts',function(){
    return view(view: 'publisher.myproducts');
});
Route::get('/createproduct',function(){
    return view(view: 'publisher.createproduct');
});
Route::get('/updateproduct',function(){
    return view(view: 'publisher.updateproduct');
});
Route::get('/statistics',function(){
    return view(view: 'publisher.statistics');
});
Route::get('/admin/index',function(){
    return view(view: 'admin.categories.create');
});
Route::get('/admin/create',function(){
    return view(view: 'admin.create');
});
Route::get('/profile',function(){
    return view(view: 'profile');
});