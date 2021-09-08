<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
};
    
Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function(){
        Route::get('brgy/info', function () {
            return view('brgy-info');
        })->name('brgy.info');
    });
});
