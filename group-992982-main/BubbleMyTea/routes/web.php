<?php

use Illuminate\Support\Facades\Route;
//import all Controller
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\DashBoardAdminController;
use App\Http\Controllers\DetailCommandeController;
use App\Http\Controllers\NumHistoryCommandeController;
use App\Http\Controllers\AdminUserController;

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


Route::get('/', [AccueilController::class, 'index'])->name('welcome');
Route::post('search', [AccueilController::class, 'store'])->name('search');

Route::get('/article/{id}', [AccueilController::class, 'show'])->name('article.show');
Route::get('/detailCommande/{id}', [DetailCommandeController::class, 'show'])->name('detailCommande.show');
Route::get('/commande', [CommandeController::class, 'index'])->name('commande');
Route::post('commande', [CommandeController::class, 'store'])->name('commande.store');

//-------------------------- panier --------------------------//
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


//-------------------------- payer --------------------------//
Route::post('payment', [NumHistoryCommandeController::class, 'store'])->name('payment.store');

// the user admin can access to the admin dashboard and the user who are not admin can't access to the admin dashboard
Route::get('/dashboardAdmin', [DashBoardAdminController::class, 'index'])
    ->name('dashboardAdmin')
    ->middleware('auth', 'admin');

Route::put('/dashboardAdminSearch/{data}', [DashBoardAdminController::class, 'show'])
    ->name('dashboardAdminSearch')
    ->middleware('auth', 'admin');

Route::get('/adminProduct', [AdminProductController::class, 'index'])
    ->name('adminProduct')
    ->middleware('auth', 'admin');

Route::post('adminProductAdd', [AdminProductController::class, 'store'])
    ->name('adminProductAdd')
    ->middleware('auth', 'admin');

Route::put('/adminProductUpdate/{id}', [AdminProductController::class, 'update'])
    ->name('adminProductUpdate')
    ->middleware('auth', 'admin');

Route::put('/adminProductDestroy/{id})', [AdminProductController::class, 'destroy'])
    ->name('adminProductDestroy')
    ->middleware('auth', 'admin');

// Admin User

Route::get('adminUser', [AdminUserController::class, 'index'])
    ->name('adminUser')
    ->middleware('auth', 'admin');

Route::post('adminUserUpdate/{id}', [AdminUserController::class, 'update'])
    ->name('adminUserUpdate')
    ->middleware('auth', 'admin');

Route::delete('adminUserDestroy/{id}', [AdminUserController::class, 'destroy'])
    ->name('adminUserDestroy')
    ->middleware('auth', 'admin');


// Login

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('authentification', [LoginController::class, 'authentification'])->name('authentification');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Register

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

// Profil

Route::get('profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::put('editProfile/{id}', [ProfileController::class, 'editProfile'])->middleware('auth');
Route::put('editPassword', [ProfileController::class, 'editPassword'])->middleware('auth');
Route::delete('deleteAccount', [ProfileController::class, 'deleteAccount'])->middleware('auth');
