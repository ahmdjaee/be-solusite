<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            // Disembunyikan dari UI/API untuk saat ini, tetap disimpan untuk kebutuhan mendatang.
            $table->string('name')->nullable();
            $table->string('code')->nullable()->unique();
            $table->enum('type', ['percentage', 'fixed']);
            $table->decimal('value', 12, 2);
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
