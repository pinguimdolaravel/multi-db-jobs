<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::connection('jeremias')->create('logs', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('jeremias')->dropIfExists('logs');
    }
};
