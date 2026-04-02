<?php

namespace CodeUrrutia\LaravelTGandWSPCore;

use Illuminate\Support\ServiceProvider;

class LaravelTGandWSPCoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(AgentEngine::class, function ($app) {
            return new AgentEngine();
        });
    }

    public function boot()
    {
        // Publicación de configuración o rutas si fuera necesario
    }
}
