<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrincipalMessage extends Model
{
    protected $fillable = [
        'name',
        'title',
        'photo',
        'message',
        'vision',
        'mission',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
