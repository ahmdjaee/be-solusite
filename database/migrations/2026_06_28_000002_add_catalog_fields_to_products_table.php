<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table): void {
            // Nullable at the database level so existing rows and migrations stay
            // valid; the API/admin validation enforces it as required on write.
            $table->foreignId('category_id')
                ->nullable()
                ->after('id')
                ->constrained('categories')
                ->nullOnDelete();

            $table->string('demo_url')->nullable()->after('thumbnail');

            // CMS package pricing (only meaningful for CMS products).
            $table->unsignedInteger('static_price')->nullable()->default(500000)->after('price');
            $table->unsignedInteger('dynamic_price')->nullable()->default(1989000)->after('static_price');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table): void {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id', 'demo_url', 'static_price', 'dynamic_price']);
        });
    }
};
