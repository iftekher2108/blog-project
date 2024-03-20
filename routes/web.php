<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function(){

Route::controller(HomeController::class)->group(function(){
    Route::get('profile','profileSetting');
    Route::get('home','index')->name('home');
});


Route::controller(SettingsController::class)->group(function(){
    Route::get('menu','index')->name('menu.index');
});

Route::controller(NewsController::class)->group(function(){

});


});


