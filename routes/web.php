<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::controller(MainController::class)->group(function(){

    Route::get('/','index')->name('home.index');
    Route::get('services','services')->name('home.services.index');
    Route::get('gallery','gallery')->name('home.gallery.index');
    Route::get('about-us','about')->name('home.about.index');
    Route::get('news','news')->name('home.news.index');
    Route::get('contact-us','contact')->name('home.contact.index');
    // Route::get('/{slug}','pages')->name('home.pages.index');

});


Route::controller(GoogleController::class)->group(function(){
    Route::get('db-seed','db_seed');
    Route::get('migrate','migrate');
    Route::get('optimize','optimize');
    Route::get('clear','clear');

});
