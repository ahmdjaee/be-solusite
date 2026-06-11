<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

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
