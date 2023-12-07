<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\info;

class MigrateCommand extends Command
{
    protected $signature = 'app:migrate';

    protected $description = 'Command description';

    public function handle(): void
    {
        info('Running migrations on connection "default"');
        $this->call('migrate');

        info('Running migrations on connection "jeremias"');
        $this->call('migrate', [ '--database' => 'jeremias']);
    }
}
