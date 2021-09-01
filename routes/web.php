<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::get('/', function () {
    return view('welcome');
});
route::get('{user_name}.nameDomin.com',[Controllers\ClientController::class,'index']);


Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('provider', Controllers\ProviderController::class)->middleware('admin');
    Route::resource('location', Controllers\LocationController::class)->middleware('provider');




});
