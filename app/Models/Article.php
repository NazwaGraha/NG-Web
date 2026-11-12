<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'focus_keyword',
        'geo_target',
        'category',
        'excerpt',
        'meta_description',
        'content',
        'image',
        'image_alt',
        'author',
        'reading_time',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    /**
     * Scope for articles that are currently live and visible to the public.
     * Must be marked as is_published AND published_at <= now() (or null).
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            });
    }

    /**
     * Scope for articles scheduled to be published in the future.
     */
    public function scopeScheduled(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '>', now());
    }

    /**
     * Check if article is currently scheduled for future publishing.
     */
    public function isScheduled(): bool
    {
        return $this->is_published && $this->published_at && $this->published_at->isFuture();
    }

    /**
     * Check if article is actively live.
     */
    public function isLive(): bool
    {
        return $this->is_published && (!$this->published_at || $this->published_at->isPast());
    }

    /**
     * Get human-readable publication status label.
     */
    public function getStatusLabelAttribute(): string
    {
        if (!$this->is_published) {
            return 'Draft';
        }

        if ($this->isScheduled()) {
            return 'Terjadwal';
        }

        return 'Terbit (Live)';
    }
}
