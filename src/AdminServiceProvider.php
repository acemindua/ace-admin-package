<?php

namespace Ace\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void {}
    public function boot(): void
    {
        // Реєструємо команду
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Ace\Admin\Console\Commands\InstallCommand::class,
            ]);
        }

        // Твої роути (якщо вже створив)
        if (file_exists(__DIR__ . '/../routes/web.php')) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        }
    }
}
