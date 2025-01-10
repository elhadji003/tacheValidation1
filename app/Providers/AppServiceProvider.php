<?php

namespace App\Providers;

use App\Models\Tache;
use App\Policies\TachePolicy;
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
        //
    }

    protected $policies = [
        Tache::class => TachePolicy::class,
    ];
}
