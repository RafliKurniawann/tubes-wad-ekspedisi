<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // Aturan harus sama dengan middleware di routes/web.php
        Gate::define('manage-ekspedisi', fn (User $user) => in_array($user->role, ['admin', 'operator'], true));
        Gate::define('delete-ekspedisi', fn (User $user) => $user->role === 'admin');
    }
}