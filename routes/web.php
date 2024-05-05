<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
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

Route::controller(MainController::class)->group(function(){

    Route::get('/','index');
    // Route::get('/{id}/{slug}','generatePage');

});


Auth::routes();


Route::middleware(['auth','admin','main_admin'])->group(function(){

Route::controller(HomeController::class)->group(function(){
    Route::get('profile','profileSetting');
    Route::get('home','index')->name('home');
});

Route::controller(SettingsController::class)->group(function(){

    Route::get('slider','slider')->name('slider.index');
});

Route::controller(MenuController::class)->group(function(){
    Route::get('menu','menu')->name('menu.index');
    Route::get('menu/create','menuCreate')->name('menu.create');
    Route::post('menu/store','menuStore')->name('menu.store');

    Route::get('menu/{id}/delete','menuDelete')->name('menu.delete');

    // sub menu
    Route::get('sub_menu/create','subMenuCreate')->name('sub_menu.create');
    Route::post('sub_menu/store','subMenuStore')->name('sub_menu.store');
    Route::get('sub_menu/{id}/delete','subMenuDelete')->name('sub_menu.delete');
});

Route::controller(NewsController::class)->group(function(){

});


});


