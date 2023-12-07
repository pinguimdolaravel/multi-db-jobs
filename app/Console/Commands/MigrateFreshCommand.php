<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Console\Migrations\FreshCommand;
use Illuminate\Database\Events\DatabaseRefreshed;
use Symfony\Component\Console\Input\InputOption;

class MigrateFreshCommand extends FreshCommand
{
    use ConfirmableTrait;

    protected $description = 'Meu Fresh Sobreescrevendo';

    public function handle()
    {
        if (! $this->confirmToProceed()) {
            return 1;
        }

        $database = $this->input->getOption('database');

        $this->newLine();

        $this->components->task('Dropping all tables', fn () => $this->callSilent('db:wipe', array_filter([
                '--database' => $database,
                '--drop-views' => $this->option('drop-views'),
                '--drop-types' => $this->option('drop-types'),
                '--force' => true,
            ])) == 0);

        $this->components->task('Dropping all tables', fn () => $this->callSilent('db:wipe', array_filter([
                '--database' => 'jeremias',
                '--drop-views' => $this->option('drop-views'),
                '--drop-types' => $this->option('drop-types'),
                '--force' => true,
            ])) == 0);

        $this->newLine();

        $this->call('migrate', array_filter([
            '--database' => $database,
            '--path' => $this->input->getOption('path'),
            '--realpath' => $this->input->getOption('realpath'),
            '--schema-path' => $this->input->getOption('schema-path'),
            '--force' => true,
            '--step' => $this->option('step'),
        ]));

        if ($this->laravel->bound(Dispatcher::class)) {
            $this->laravel[Dispatcher::class]->dispatch(
                new DatabaseRefreshed($database, $this->needsSeeding())
            );
        }

        if ($this->needsSeeding()) {
            $this->runSeeder($database);
        }

        return 0;
    }
}
