<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('admin', function (User $user) {
            return $user->level == 'admin';
        });

        Gate::define('dosen', function (User $user) {
            return $user->level == 'dosen';
        });

        Gate::define('mahasiswa', function (User $user) {
            return $user->level == 'mahasiswa';
        });
    }
}
