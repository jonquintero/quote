<?php

namespace Modules\InsuranceQuote\Providers;

use Illuminate\Support\ServiceProvider;

class InsuranceQuoteServiceProvider extends ServiceProvider
{
    public function boot(): void
       {
           $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
          // $this->mergeConfigFrom(__DIR__.'/../config.php', 'clientCategory');

           $this->app->register(RouteServiceProvider::class);
       }
}
