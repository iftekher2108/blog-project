<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.front',function($view){
            $menus = Menu::where('status','publish')->orderBy('order_id','asc')->limit(10)->get();
            $view->with('menus',$menus);
        });
    }
}
