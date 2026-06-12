<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const TABLES = ['products', 'services', 'portfolios', 'plans'];

    public function up(): void
    {
        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $blueprint): void {
                $blueprint->unsignedInteger('sort_order')->default(0)->index();
            });

            DB::table($table)
                ->orderBy('id')
                ->pluck('id')
                ->each(function (int $id, int $index) use ($table): void {
                    DB::table($table)->where('id', $id)->update(['sort_order' => $index + 1]);
                });
        }
    }

    public function down(): void
    {
        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $blueprint): void {
                $blueprint->dropColumn('sort_order');
            });
        }
    }
};
