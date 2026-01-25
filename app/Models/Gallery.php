<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'type',
        'image',
        'video_url',
        'description',
        'category',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function scopePhotos($query)
    {
        return $query->where('type', 'photo');
    }

    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getYoutubeIdAttribute()
    {
        if ($this->type !== 'video' || empty($this->video_url)) {
            return null;
        }

        $patterns = [
            '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/|youtube\.com\/shorts\/|youtube\.com\/live\/)([a-zA-Z0-9_-]{11})/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $this->video_url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    public function getYoutubeThumbnailAttribute()
    {
        $videoId = $this->youtube_id;
        if (!$videoId) {
            return null;
        }

        return "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
    }

    public function getEmbedUrlAttribute()
    {
        $videoId = $this->youtube_id;
        if ($videoId) {
            return "https://www.youtube.com/embed/{$videoId}";
        }

        return $this->video_url;
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        if ($this->type === 'video' && $this->youtube_thumbnail) {
            return $this->youtube_thumbnail;
        }

        // Final fallback for videos or photos without image
        $text = $this->title ? urlencode($this->title) : 'SMK+YAJ';
        return "https://ui-avatars.com/api/?name={$text}&background=8C51A5&color=fff&size=800";
    }
}
