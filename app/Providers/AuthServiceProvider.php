<?php

namespace App\Providers;

use App\Models\Grupo;
use App\Policies\GrupoPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
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
        Gate::policy(Grupo::class, GrupoPolicy::class);
    }
}
