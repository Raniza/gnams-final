<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Horensou\HorensouRequestController;
use App\Http\Controllers\Horensou\HorensouResponseController;
use App\Http\Controllers\LoginController;

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

Route::get('/gnams', function () {
    return redirect()->route('horensou.request.index');
})->name('home');

Route::get('gnams/login', function() {
    return view('login');
})->name('login.form');

Route::post('/auth', [\App\Http\Controllers\Admin\UserController::class, 'authenticate'])->name('login');

Route::group(['middleware' => 'auth', 'prefix' => 'gnams'], function(){
    Route::get('/logout', [\App\Http\Controllers\Admin\UserController::class, 'logout'])->name('logout');
    Route::middleware('is_admin')->group(function() {
        Route::get('/admin', App\Http\Controllers\Admin\AdminController::class)->name('admin');
        Route::resource('/user', \App\Http\Controllers\Admin\UserController::class);
    });
    
    Route::prefix('horensou')->group(function(){
        Route::name('horensou.')->group(function(){
            Route::resource('/request', HorensouRequestController::class);
            Route::resource('/response', HorensouResponseController::class);
            Route::get('/data-table', [HorensouRequestController::class, 'horensouDatatable'])->name('datatable');
        });
    });
});
    

