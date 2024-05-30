<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ServiceCatagoryController;

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

// ================================= Auth Routes ================================================
Auth::routes();
// ================================= Auth Routes ================================================


// =================================== Auth Admin Middleware start ==================================================

Route::middleware(['auth','admin'])->group(function(){

// ============================= profile  section start ===============================================
Route::controller(HomeController::class)->group(function(){
    Route::get('profile','profileSetting');
    Route::get('home','index')->name('home');
});
// ============================= profile section end ==============================================


// ============================ utilities setting section start ============================
Route::controller(SettingsController::class)->group(function(){

    // home slider section
    Route::get('slider','slider')->name('slider.index');
    Route::post('slider/order/change','slider_order')->name('slider.order.change');
    Route::get('slider/create','slider_create')->name('slider.create');
    Route::post('slider/store','slider_store')->name('slider.store');

});
// ============================ utilities setting section end ============================


// =================================== service section start =================================
Route::controller(ServiceController::class)->group(function(){
    Route::get('service','service')->name('service.index');
    Route::get('service/create','serviceCreate')->name('service.create');
    Route::post('service/store','serviceStore')->name('service.store');
    Route::get('service/{id}/delete','ServiceDelete')->name('service.delete');
});

Route::controller(ServiceCatagoryController::class)->group(function(){
    Route::get('service/category/create','CreateCatagory')->name('service.category.create');
    Route::post('service/category/store','StoreCatagory')->name('service.category.store');

});

// ==================================== service section end ======================================


// =================================== menu section start ========================================

Route::controller(MenuController::class)->group(function(){
    Route::get('menu','menu')->name('menu.index');
    Route::post('menu/order/change','menu_order')->name('menu.order.change');
    Route::get('menu/create','menu_create')->name('menu.create');
    Route::post('menu/store','menu_store')->name('menu.store');
    Route::get('menu/{id}/delete','menu_delete')->name('menu.delete');

});

// ===================================== menu section end =========================================



// ===================================== news section start =========================================

Route::controller(NewsController::class)->group(function(){

});

// ===================================== news section end =========================================


// ===================================== pages section start =========================================
Route::controller(PagesController::class)->group(function(){
    Route::get('pages','index')->name('page.index');
});

// ===================================== pages section end =========================================

});

// ===================================== Auth admin middleware end =========================================


Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
