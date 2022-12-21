<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::view('/', 'auth.login')->middleware('guest')->name('createLogin');
Route::post('/', [LoginController::class, 'login'])->middleware('guest')->name('storeLogin');

Route::view('register', 'auth.register')->middleware('guest')->name('createRegister');
Route::post('register', [RegisterController::class, 'storeRegister'])->middleware('guest')->name('storeRegister');
Route::view('sent-confirmation', 'components.sent-confirmation')->middleware('guest')->name('sentEmailConfirmation');
Route::view('forget-password', 'components.forgot-password')->middleware('guest')->name('forget.password.get');
Route::view('after-email-confirmation', 'components.after-email-confirmation')->middleware('guest')->name('afterEmailConfirmation');
Route::view('after-password-changed', 'components.after-password-changed')->name('password-changed');

Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}/{email}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->middleware('guest')->name('user.verify');
Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('dashboard/bycountry', [DashboardController::class, 'byCountry'])->middleware('auth')->name('dashboardByCountry');

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
