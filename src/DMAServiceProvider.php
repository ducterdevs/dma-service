<?php

namespace Ducterdevs\DucterMasterAuthentication;

use Ducterdevs\DucterMasterAuthentication\DMA;
use Ducterdevs\DucterMasterAuthentication\Http\Middleware\DMAuthentication;
use Illuminate\Support\ServiceProvider;

class DMAServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(DMA::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerMiddlewares();
        $this->registerPublishing();
        $this->registerCommands();
    }


    /**
     * Register the package's publishable resources.
     */
    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/dma.php' => config_path('dma.php'),
            ], ['dma', 'dma-config']);
        }
    }

    /**
     * Register the package's commands.
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([]);
        }
    }

     /**
     * Register the package's commands.
     */
    protected function registerMiddlewares(): void
    {
        $this->app['router']->aliasMiddleware('auth:dma', DMAuthentication::class);
    }
}
