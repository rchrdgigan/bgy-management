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

        Route::get('brgy/official', function () {
            return view('brgy-official');
        })->name('brgy.official');

        Route::get('brgy/manage/officials', function () {
            return view('brgy-manage-officials');
        })->name('brgy.manage-offcials');

        Route::get('add/residents', function () {
            return view('add-residents');
        })->name('add.residents');
    });
});
