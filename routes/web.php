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
    return view('auth.login');
})->name('home');

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', App\Http\Controllers\UserController::class)->except('show');
    Route::resource('providers', App\Http\Controllers\ProviderController::class)->except('show');
    Route::resource('babyAnimals', App\Http\Controllers\BabyAnimalsController::class)->except('show');
    Route::get('clasificationHealthy', [App\Http\Controllers\BabyAnimalsController::class, 'clasificationHealthy'])->name('clasificationHealthy');
    Route::get('clasificationSick', [App\Http\Controllers\BabyAnimalsController::class, 'clasificationSick'])->name('clasificationSick');
    Route::resource('sensors', App\Http\Controllers\SensorsController::class)->except('show');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

