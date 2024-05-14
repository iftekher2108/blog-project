<?php

namespace App\Providers;

use App\Models\Settings;
use App\Models\menu;
use App\Models\subMenu;
use Illuminate\Support\Facades\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // view()->share('app_data',::all());

        try {
            $data = Settings::where('data_name','info')->get();
            View::share('store',$data);

            }
             catch (QueryException $e) {
                $data = [];
                View::share(['store'=> $data]);
            }

    }
}
