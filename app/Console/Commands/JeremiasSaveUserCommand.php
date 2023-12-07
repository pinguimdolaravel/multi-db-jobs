<?php

namespace App\Console\Commands;

use App\Jobs\SaveUserJob;
use Illuminate\Console\Command;

class JeremiasSaveUserCommand extends Command
{
    protected $signature = 'jeremias:save-user';

    protected $description = 'Command description';

    public function handle(): void
    {
        SaveUserJob::dispatch(
            db: 'jeremias',
            name: 'Jeremias User',
            email: 'bagaca@user.com'
        );
    }
}
