<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('discounts', function (Blueprint $table): void {
            // name & code disembunyikan dari UI/API; dibuat nullable agar diskon
            // bisa dibuat tanpa keduanya, sambil tetap tersimpan untuk kebutuhan nanti.
            $table->string('name')->nullable()->change();
            $table->string('code')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('discounts', function (Blueprint $table): void {
            $table->string('name')->nullable(false)->change();
            $table->string('code')->nullable(false)->change();
        });
    }
};
