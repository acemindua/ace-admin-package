<?php

namespace Ace\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register(): void {}
    public function boot(): void
    {
        // Кажемо Laravel завантажити роути з нашого пакета
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
