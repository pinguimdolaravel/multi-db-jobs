<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class SaveUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public readonly string $db,
        public readonly string $name,
        public readonly string $email,
    )
    {
    }

    public function handle(): void
    {
//        Config::set('database.default', $this->db);



        User::on($this->db)->create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt('password'),
            ]);
    }
}
