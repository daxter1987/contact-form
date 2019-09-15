<?php

namespace daxter1987\contactform;
use Illuminate\Support\ServiceProvider;

class ContactFormServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'contactform');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishControllers();
        $this->publishModels();
    }
    public function register()
    {
    }

    private function publishControllers(){
        $this->publishes([
            __DIR__.'/app/Http/Controllers/DaxControllers' => app_path('Http/Controllers/DaxControllers'),
        ], 'dax');
    }

    private function publishModels(){
        $this->publishes([
            __DIR__.'/app/Http/Models/DaxModels' => app_path('/Http/Models/DaxModels'),
        ], 'dax');
    }
}
