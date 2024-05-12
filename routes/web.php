<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;

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




Auth::routes();


Route::middleware(['auth','admin'])->group(function(){

Route::controller(HomeController::class)->group(function(){
    Route::get('profile','profileSetting');
    Route::get('home','index')->name('home');
});

Route::controller(SettingsController::class)->group(function(){

    Route::get('slider','slider')->name('slider.index');

});

Route::controller(MenuController::class)->group(function(){
    Route::get('menu','menu')->name('menu.index');
    Route::post('menu/order/change','menu_order')->name('menu.order.change');
    Route::get('menu/create','menuCreate')->name('menu.create');
    Route::post('menu/store','menuStore')->name('menu.store');
    Route::get('menu/{id}/delete','menuDelete')->name('menu.delete');

});

Route::controller(NewsController::class)->group(function(){

});

Route::controller(PagesController::class)->group(function(){
    Route::get('pages','index')->name('page.index');
});

});


Route::controller(MainController::class)->group(function(){

    Route::get('/','index')->name('home.index');
    Route::get('gallery','gallery')->name('gallery.index');
    Route::get('about-us','about')->name('about.index');
    Route::get('news','news')->name('news.index');
    Route::get('contact-us','contact')->name('contact.index');

});
