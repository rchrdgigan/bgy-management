<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
    

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function(){
        Route::get('/', function () {
            return view('home');
        });
        Route::get('brgy/info', function () {
            return view('brgy-info');
        })->name('brgy.info');
    });
});
