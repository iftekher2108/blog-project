<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::controller(MainController::class)->group(function(){

    Route::get('/','index')->name('home.index');
    Route::get('gallery','gallery')->name('gallery.index');
    Route::get('about-us','about')->name('about.index');
    Route::get('news','news')->name('news.index');
    Route::get('contact-us','contact')->name('contact.index');

});
