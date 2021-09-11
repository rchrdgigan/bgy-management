<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
};
    
Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::prefix('admin')->group(function(){
        Route::get('brgy/info', function () {
            return view('brgy-info');
        })->name('brgy.info');
    });
});
