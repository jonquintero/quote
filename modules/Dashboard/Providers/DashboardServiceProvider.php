<?php

namespace Modules\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
      //  $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
      //  $this->mergeConfigFrom(__DIR__.'/../config.php', 'clientGroup');

        $this->app->register(RouteServiceProvider::class);

    }
}
