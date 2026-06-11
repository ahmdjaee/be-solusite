<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('short');
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('label')->nullable();
            $table->string('status')->default('draft');
            $table->enum('type', ['app', 'source-code'])->default('app');
            $table->enum('availability', ['ready', 'custom'])->default('ready');
            $table->json('tags')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
