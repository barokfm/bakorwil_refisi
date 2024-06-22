<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        Gate::define('admin', function(User $user){
            return $user->jabatan_id === 1;
        });

        Gate::define('kepala', function(User $user){
            return $user->jabatan_id === 2;
        });

        Gate::define('sekertaris', function(User $user){
            return $user->jabatan_id === 3;
        });
    }
}
