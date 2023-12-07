<?php

namespace App\Console\Commands;

use App\Jobs\SaveLogJob;
use Illuminate\Console\Command;

class PlaygroundCommand extends Command
{
    protected $signature = 'play';

    protected $description = 'Command description';

    public function handle(): void
    {
        for ($i = 0; $i < 100; $i++) {
            SaveLogJob::dispatch("Message {$i}");
        }
    }
}
