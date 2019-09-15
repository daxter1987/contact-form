<?php

namespace daxter1987\contactform;
use Illuminate\Support\ServiceProvider;

class ContactFormServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'contactform');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->commands([
            Commands\ConfigureComposer::class,
        ]);
    }

    public function register()
    {
    }
}
