<?php

namespace App\Providers;

use App\Http\Controllers\UserController;
use App\Interfaces\AuthInterface;
use App\Repositories\UserRepositories;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\AdminController;
use App\Repositories\AdminRepositories;

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
        $this->app->when(AdminController::class)
            ->needs(AuthInterface::class)
            ->give(function () {
                return app(AdminRepositories::class);
            });

        $this->app->when(UserController::class)
            ->needs(AuthInterface::class)
            ->give(function () {
                return app(UserRepositories::class);
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
