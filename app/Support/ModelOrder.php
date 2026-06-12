<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ModelOrder
{
    /**
     * @param  class-string<Model>  $modelClass
     * @param  array<int, int>  $ids
     */
    public static function update(string $modelClass, array $ids): void
    {
        $models = $modelClass::query()
            ->whereKey($ids)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'sort_order']);

        if ($models->count() !== count($ids)) {
            throw ValidationException::withMessages([
                'items' => 'Satu atau lebih data tidak ditemukan.',
            ]);
        }

        $positions = $models->pluck('sort_order')->sort()->values();

        DB::transaction(function () use ($modelClass, $ids, $positions): void {
            foreach ($ids as $index => $id) {
                $modelClass::query()->whereKey($id)->update([
                    'sort_order' => $positions[$index],
                ]);
            }
        });
    }
}
