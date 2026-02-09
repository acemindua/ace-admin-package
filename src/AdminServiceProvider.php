<?php

namespace Ace\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ace-admin');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Ace\Admin\Console\Commands\InstallCommand::class,
            ]);

            // Обчислюємо шлях до кореня пакета, де лежить dist
            // __DIR__ - це src/
            // dirname(__DIR__) - це корінь пакета
            $distPath = dirname(__DIR__) . '/dist';

            $this->publishes([
                $distPath => public_path('vendor/ace-admin'),
            ], 'ace-admin-assets');
        }
    }
}
