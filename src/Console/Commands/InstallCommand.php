<?php

namespace Ace\Admin\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'ace-admin:install';
    protected $description = 'Install Ace Admin Package';

    public function handle()
    {
        $this->info('Встановлення Ace Admin...');

        $this->setupViteAlias();

        // Викликаємо публікацію, яку ми опишемо в Провайдері
        $this->call('vendor:publish', [
            '--provider' => "Ace\Admin\AdminServiceProvider",
            '--tag' => "ace-admin-assets",
            '--force' => true
        ]);

        $this->info('Ace Admin успішно налаштовано!');
    }

    protected function setupViteAlias()
    {
        $viteConfigPath = base_path('vite.config.js');
        if (!file_exists($viteConfigPath)) return;

        $currentConfig = file_get_contents($viteConfigPath);

        if (str_contains($currentConfig, '@AceAdmin')) {
            $this->info('Alias @AceAdmin вже існує.');
            return;
        }

        // Покращений паттерн для пошуку секції alias
        $pattern = '/alias:\s*\{/';
        if (preg_match($pattern, $currentConfig)) {
            $alias = "\n            '@AceAdmin': 'vendor/acemindua/ace-admin-package/resources/js',";
            $newConfig = preg_replace($pattern, "alias: {{$alias}", $currentConfig);
            file_put_contents($viteConfigPath, $newConfig);
            $this->info('Alias додано у vite.config.js');
        }
    }
}
