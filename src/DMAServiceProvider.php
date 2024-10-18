<?php

namespace Ducterdevs\DucterMasterAuthentication;

use Ducterdevs\DucterMasterAuthentication\DMA;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class EnergizerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/energizer.php',
            'energizer'
        );

        $this->app->singleton(DMA::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
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
}
