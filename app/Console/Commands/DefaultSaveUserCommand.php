<?php

namespace App\Console\Commands;

use App\Jobs\SaveUserJob;
use Illuminate\Console\Command;

class DefaultSaveUserCommand extends Command
{
    protected $signature = 'default:save-user';

    protected $description = 'Command description';

    public function handle(): void
    {
        SaveUserJob::dispatch(
            db: 'sqlite',
            name: 'Test User',
            email: 'bagaca@user.com'
        );
    }
}
