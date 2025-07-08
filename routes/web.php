<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Profile;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\Settings;
use App\Livewire\Bids\CreateBid;
use App\Livewire\Bids\EditBid;
use App\Livewire\Bids\ListBids;
use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Registrations\BidRegistrations;
use App\Livewire\Registrations\ViewRegistrations;
use App\Livewire\Staffs\CreateStaff;
use App\Livewire\Staffs\EditStaff;
use App\Livewire\Staffs\ListStaffs;
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
    //Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{token}/{email}', ResetPassword::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/bids', ListBids::class)->name('bids');
    Route::get('/bids/create', CreateBid::class)->name('bids.create');
    Route::get('/bids/edit/{bidid}', EditBid::class)->name('bids.edit');

    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/settings', Settings::class)->name('settings');
    Route::get('/staffs/edit/{userid}', EditStaff::class)->name('staffs.edit');
    Route::get('/staffs', ListStaffs::class)->name('list-staff');
    Route::get('/staffs/create', CreateStaff::class)->name('create-staff');
});

//Route::view('/', 'home', ['name' => 'home']);
Route::get('/', Home::class)->name('home');

Route::get('/bid/register/{bidId}', BidRegistrations::class)->name('bidregistration');
Route::get('/bid/registrations/{bidId}', ViewRegistrations::class)->name('viewregistrations');
