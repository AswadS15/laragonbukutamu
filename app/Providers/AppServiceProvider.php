<?php

namespace App\Providers;

use Auth;
use Hash;
use App\Models\Tujuan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        View::composer('componen.sidebar', function ($view) {
            $belum = Tujuan::where('status', '0')->count();
            $view->with('belum', $belum);
        });
    }
}
