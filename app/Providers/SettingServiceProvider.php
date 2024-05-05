<?php

namespace App\Providers;

use App\Models\Settings;
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
            $data = Settings::all();
            View::share('store',$data);
            }
             catch (QueryException $e) {
                $data = [];
                View::share('store', $data);
            }

    }
}
