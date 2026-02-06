<?php

namespace App\Providers;

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

        View::composer('partials._sidebar_admin', function($view) {
            if (Auth::check()) {
                $role = Auth::user()->role;
                $menus = $role->menus()->with('submenus')->get();
                $view->with('menus', $menus);
            } else {
                $view->with('menus', collect([]));
            }
        });
    }
}
