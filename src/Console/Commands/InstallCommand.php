<?php

namespace Ace\Admin\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    // Це ім'я команди, яке ти викликаєш у composer.json
    protected $signature = 'ace-admin:install';
    protected $description = 'Install Ace Admin Package';

    public function handle()
    {
        $this->info('Встановлення Ace Admin...');

        $this->setupViteAlias();

        // У методі handle() додаємо:
        $this->call('vendor:publish', [
            '--provider' => "Ace\Admin\AdminServiceProvider",
            '--tag' => "ace-admin-assets"
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/js' => resource_path('js/vendor/ace-admin'),
            ], 'ace-admin-assets');
        }
    }

    protected function setupViteAlias()
    {
        $viteConfigPath = base_path('vite.config.js');

        if (!file_exists($viteConfigPath)) {
            $this->warn('vite.config.js не знайдено. Будь ласка, додайте alias вручну.');
            return;
        }

        $currentConfig = file_get_contents($viteConfigPath);
        $alias = "'@AceAdmin': 'vendor/acemindua/ace-admin-package/resources/js'";

        // Перевіряємо, чи alias вже існує
        if (str_contains($currentConfig, '@AceAdmin')) {
            $this->info('Alias @AceAdmin вже існує у vite.config.js');
            return;
        }

        // Шукаємо секцію alias: { і вставляємо туди наш рядок
        $pattern = '/alias:\s*\{/';
        if (preg_match($pattern, $currentConfig)) {
            $replacement = "alias: {\n            $alias,";
            $newConfig = preg_replace($pattern, $replacement, $currentConfig);
            file_put_contents($viteConfigPath, $newConfig);
            $this->info('Alias додано у vite.config.js');
        } else {
            $this->error('Не вдалося знайти секцію alias у vite.config.js. Додайте її вручну.');
        }
    }
}
