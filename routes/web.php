<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\RegisterComponent;
use App\Http\Livewire\ResultComponent;
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

Route::get('/', HomeComponent::class);

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('auth_register');
    Route::get('/login', [AuthController::class, 'login'])->name('auth_login');
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth_logout');
    });
});

Route::middleware('guest')->group(function () {
    Route::any('/login', LoginComponent::class)->name('login');
    Route::any('/register', RegisterComponent::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', ResultComponent::class)->name('home');
});
