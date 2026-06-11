<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('level');
            $table->decimal('price', 12, 2);
            $table->enum('availability', ['ready', 'custom'])->default('ready');
            $table->json('features')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
