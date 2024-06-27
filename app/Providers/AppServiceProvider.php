<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
    }

    public function boot(): void
    {
        Gate::define('update-pet', function (User $user) {
            return $user->role_id === 1;
        });
        \Carbon\Carbon::setLocale(config('app.locale'));
    }
}
