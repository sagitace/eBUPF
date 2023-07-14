<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Show Home or Landing Page
Route::get('/', function () {
    return view('home');
});

// Show Admin Ledger
Route::get('/admin-ledger', function (){
    return view('admin-views.admin-ledger');
});

// Show login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

// Show Register Form
Route::get('/register', [UserController::class, 'create'])->name('register');

// Store Registered User
Route::post('/users', [UserController::class, 'store']);

Route::get('/new-member', function(){
    return view('member-views.non-member');
});

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('/');
 });

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
