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
    ->name('auth.')
    ->group(function () {
        Route::get('login', Auth\Login::class)->name('login');
        Route::get('recuperar-senha', Auth\Login::class)->name('password.request');
        Route::get('recuperar-senha/{token}', Auth\Login::class)->name('password.reset');
    });

Route::prefix('dashboard')
    ->middleware('verified')
    ->name('dashboard.')
    ->group(function () {
        Route::get('', Dashboard\Dashboard::class)->name('home');
    });
