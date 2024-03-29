<?php

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/auth/google', [\App\Http\Controllers\Auth\GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\GoogleAuthController::class, 'callback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/secret', function () {
    return 'secret';
})->middleware(['auth', 'password.confirm']);

Route::middleware('auth')->group(function () {
    Route::get('profile', [\App\Http\Controllers\profileController::class, 'index'])->name('profile');
    Route::get('profile/twofactor', [\App\Http\Controllers\profileController::class, 'manageTwoFactor'])->name('twoFactor');
    Route::post('profile/twofactor', [\App\Http\Controllers\profileController::class, 'handelManageTwoFactor'])->name('handelTwoFactor');
});




