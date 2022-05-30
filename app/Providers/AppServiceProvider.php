<?php

namespace App\Providers;

use App\Models\PersonalAccessToken;
use Illuminate\Foundation\AliasLoader;
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
        Gate::define('employee', 'App\\Policies\EmployeePolicy@authorize');
    }

    public function boot()
    {
        // Loader Alias
        $loader = AliasLoader::getInstance();

        // SANCTUM CUSTOM PERSONAL-ACCESS-TOKEN
        $loader->alias(\Laravel\Sanctum\PersonalAccessToken::class, PersonalAccessToken::class);
    }
}
