<?php

namespace App\Models;

use App\Models\Concerns\HasSortOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory, HasSortOrder;

    protected $fillable = [
        'name',
        'description',
        'price',
        'highlight',
        'features',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'highlight' => 'boolean',
            'features' => 'array',
        ];
    }
}
