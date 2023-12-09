<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach (['jetete', 'jeremias'] as $db) {
            $this->registerDatabase($db);
        }

    }

    private function registerDatabase(string $db): void
    {
        Config::set("database.connections.{$db}", [
            'driver' => 'sqlite',
            'database' => database_path("{$db}.sqlite"),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ]);
    }
}
