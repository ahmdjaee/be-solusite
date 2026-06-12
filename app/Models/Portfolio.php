<?php

namespace App\Models;

use App\Models\Concerns\HasSortOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory, HasSortOrder;

    protected $fillable = [
        'name',
        'description',
        'stack',
    ];

    protected function casts(): array
    {
        return [
            'stack' => 'array',
        ];
    }
}
