<?php

namespace Ace\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void {}
    public function boot(): void
    {
        // 1. Реєструємо команду
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Ace\Admin\Console\Commands\InstallCommand::class,
            ]);

            // 2. Реєструємо ПУБЛІКАЦІЮ асетів
            // Важливо: перевір, чи папка resources/js реально існує в пакеті!
            $this->publishes([
                __DIR__ . '/../resources/js' => resource_path('js/vendor/ace-admin'),
            ], 'ace-admin-assets');
        }

        // 3. Завантажуємо роути
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
