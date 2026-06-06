<?php

namespace App\Providers;

use App\Http\View\Composers\SidebarComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        //    View::share('auth', Auth::user());
        View::composer('partials._sidebar_admin', SidebarComposer::class);
    }
}
