<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;
    
    protected static function boot()
    {
        parent::boot();
        
        static::saving(function ($model) {
            if (!empty($model->selected_dates)) {
                $dates = collect($model->selected_dates)->sort();
                if ($dates->isNotEmpty()) {
                    $model->event_date = $dates->first();
                }
            }
        });
    }

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'end_date',
        'selected_dates',
        'category',
        'is_active',
    ];

    protected $casts = [
        'event_date' => 'date',
        'end_date' => 'date',
        'selected_dates' => 'array',
        'is_active' => 'boolean',
    ];

    // Category definitions: single source of truth
    const CATEGORIES = [
        'akademik' => [
            'label' => 'Akademik',
            'color' => '#8C51A5',
            'bg'    => 'bg-[#8C51A5]',
            'icon'  => 'fas fa-graduation-cap',
        ],
        'libur' => [
            'label' => 'Libur / Ujian',
            'color' => '#EF4444',
            'bg'    => 'bg-red-500',
            'icon'  => 'fas fa-calendar-times',
        ],
        'event' => [
            'label' => 'Event Sekolah',
            'color' => '#F8CB62',
            'bg'    => 'bg-[#F8CB62]',
            'icon'  => 'fas fa-star',
        ],
    ];

    public function getCategoryColorAttribute(): string
    {
        return self::CATEGORIES[$this->category]['color'] ?? '#8C51A5';
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORIES[$this->category]['label'] ?? ucfirst($this->category);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
