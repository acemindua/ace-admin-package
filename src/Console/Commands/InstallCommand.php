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

        // Тут пізніше додамо публікацію файлів, міграції тощо
        $this->comment('Ace Admin успішно встановлено!');
    }
}
