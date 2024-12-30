<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Bids\CreateBid;
use App\Livewire\Bids\EditBid;
use App\Livewire\Bids\ListBids;
use App\Livewire\Dashboard;
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

Route::middleware('guest')->group(function () {
    //Route::get('/', function () { return view('home');})->name('home');
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{token}/{email}', ResetPassword::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/bids', ListBids::class)->name('bids');
    Route::get('/bids/create', CreateBid::class)->name('bids.create');
    Route::get('/bids/edit/{bidid}', EditBid::class)->name('bids.edit');
});

//Route::view('/', 'home', ['name' => 'home']);
Route::view('/', 'home')->name('home');
