<?php

use App\Http\Livewire\Pages\Auth;
use App\Http\Livewire\Pages\Dashboard;
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

Route::get('', Auth\Login::class)->name('home');

Route::middleware('guest')
    ->group(function () {
        Route::get('login', Auth\Login::class)->name('login');
        Route::get('forgot-password', Auth\ForgotPassword::class)->name('password.request');
        Route::get('reset-password/{token}', Auth\ResetPassword::class)->name('password.reset');
    });

Route::middleware('auth')
    ->get('confirm-password', Auth\ConfirmPassword::class)
    ->name('password.confirm');

Route::prefix('dashboard')
    ->middleware('verified')
    ->name('dashboard.')
    ->group(function () {
        Route::get('', Dashboard\Dashboard::class)->name('home');
    });
