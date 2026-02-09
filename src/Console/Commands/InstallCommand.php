<?php

namespace Ace\Admin\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'ace-admin:install';
    protected $description = 'Встановлення асетів Ace Admin';

    public function handle()
    {
        $this->info('🚀 Початок встановлення Ace Admin...');

        // 1. Публікуємо ресурси через Провайдер (якщо там налаштована публікація)
        $this->call('vendor:publish', [
            '--provider' => "Ace\Admin\AdminServiceProvider",
            '--tag' => "ace-admin-assets",
            '--force' => true
        ]);

        // 2. Копіюємо зібраний JS з dist пакета в public проекта
        $this->publishCompiledJs();

        $this->info('✅ Ace Admin успішно налаштовано!');
    }

    protected function publishCompiledJs()
    {
        // Шлях до зібраного файлу всередині пакета (у vendor)
        $sourcePath = base_path('vendor/acemindua/ace-admin-package/dist/app.js');

        // Шлях призначення у публічній папці проекта market
        $publicPath = public_path('vendor/ace-admin');
        $destinationPath = $publicPath . '/app.js';

        if (!File::exists($sourcePath)) {
            $this->error('❌ Помилка: Зібраний файл app.js не знайдено у vendor. Переконайтеся, що ви зробили "npm run build" перед пушем пакета.');
            return;
        }

        if (!File::isDirectory($publicPath)) {
            File::makeDirectory($publicPath, 0755, true);
        }

        File::copy($sourcePath, $destinationPath);
        $this->info('📦 Автономний JS скопійовано у public/vendor/ace-admin/app.js');
    }
}
