<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('osis', function(User $user){
            return in_array($user->name, ['OSIS', 'Utama']);
        });

        Gate::define('mpk', function(User $user){
            return in_array($user->name, ['MPK', 'Utama']);
        });
    }
}
