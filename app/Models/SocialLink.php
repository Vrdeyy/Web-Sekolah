<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'platform',
        'url',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getIconClassAttribute()
    {
        if ($this->icon) {
            return $this->icon;
        }

        return match (strtolower($this->platform)) {
            'facebook' => 'fab fa-facebook-f',
            'instagram' => 'fab fa-instagram',
            'twitter', 'x' => 'fab fa-x-twitter',
            'youtube' => 'fab fa-youtube',
            'tiktok' => 'fab fa-tiktok',
            'linkedin' => 'fab fa-linkedin-in',
            'whatsapp' => 'fab fa-whatsapp',
            default => 'fas fa-link',
        };
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
