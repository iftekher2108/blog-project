<?php

use App\Http\Controllers\CategoryController;
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
use App\Http\Controllers\SliderController;

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
Auth::routes([

]);
// 'register' => false
// ================================= Auth Routes ================================================

// =================================== Auth Admin Middleware start ==================================================

// roles:admin
// super-admin
// admin
// editor
// user

Route::middleware(['auth'])->group(function(){

// ============================= profile  section start ===============================================
Route::controller(HomeController::class)->group(function(){
    Route::get('profile','profileSetting');
    Route::get('home','index')->name('home');
});
// ============================= profile section end ==============================================


// ============================ utilities setting section start ============================
Route::controller(SettingsController::class)->group(function(){

})->middleware('admin:super-admin');
// ============================ utilities setting section end ============================


// ============================ slider setting section start ============================
Route::controller(SliderController::class)->group(function(){

    // home slider section
    Route::get('slider','slider')->name('slider.index');
    Route::post('slider/order/change','slider_order')->name('slider.order.change');
    Route::get('slider/create','slider_create')->name('slider.create');
    Route::post('slider/store','slider_store')->name('slider.store');
    Route::get('slider/{id}/edit','slider_edit')->name('slider.edit');
    Route::post('slider/{id}/update','slider_update')->name('slider.update');
    Route::get('slider/{id}/delete','slider_delete')->name('slider.delete');
    Route::post('slider/delete-all','slider_delete_all')->name('slider.delete_all');

})->middleware('admin:super-admin');

// =================================== slider setting section ens =================================



// =================================== service section start =================================
Route::controller(ServiceController::class)->group(function(){
    Route::get('service','service')->name('service.index');
    Route::post('service/order/change','service_order')->name('service.order.change');
    Route::get('service/create','serviceCreate')->name('service.create');
    Route::post('service/store','serviceStore')->name('service.store');
    Route::get('service/{id}/edit','serviceEdit')->name('service.edit');
    Route::post('service/{id}/update','serviceUpdate')->name('service.update');
    Route::get('service/{id}/delete','ServiceDelete')->name('service.delete');
    Route::post('service/delete-all','service_delete_all')->name('service.delete_all');
})->middleware('admin:super-admin');


// ==================================== service section end ======================================


// =================================== menu section start ========================================

Route::controller(MenuController::class)->group(function(){
    Route::get('menu','menu')->name('menu.index');
    Route::post('menu/order/change','menu_order')->name('menu.order.change');
    Route::get('menu/{id}/edit','menu_edit')->name('menu.edit');
    Route::post('menu/{id}/update','menu_update')->name('menu.update');

})->middleware('admin:super-admin');

// ===================================== menu section end =========================================


// ===================================== Categories section start =========================================
Route::controller(CategoryController::class)->group(function(){
    Route::get('news/category','index')->name('category.index');
    Route::get('news/category/create','create')->name('category.create');
    Route::post('news/category/store','store')->name('category.store');

})->middleware("admin:super-admin");

// ===================================== Categories section end =========================================


// ===================================== news section start =========================================

Route::controller(NewsController::class)->group(function(){
    Route::get('news/list','index')->name('news.index');
    Route::get('news/create','create')->name('news.create');
})->middleware('admin:super-admin');

// ===================================== news section end =========================================


// ===================================== pages section start =========================================
// Route::controller(PagesController::class)->group(function(){
//     Route::get('pages','pageIndex')->name('page.index');
//     Route::get('pages/create','pageCreate')->name('pages.create');
//     Route::post('pages/store','pageStore')->name('pages.store');
// })->middleware('admin:super-admin');

// ===================================== pages section end =========================================

});

// ===================================== Auth admin middleware end =========================================

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

