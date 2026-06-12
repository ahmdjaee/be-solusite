<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait HasSortOrder
{
    public static function bootHasSortOrder(): void
    {
        static::creating(function (Model $model): void {
            if ($model->sort_order) {
                return;
            }

            $model->sort_order = ((int) static::query()->max('sort_order')) + 1;
        });
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
