<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'target_badge',
        'tagline',
        'original_price',
        'price_prefix',
        'price',
        'discount_tag',
        'features',
        'cta_text',
        'cta_whatsapp_text',
        'is_popular',
        'popular_badge_text',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($package) {
            if (empty($package->slug)) {
                $package->slug = Str::slug($package->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order', 'asc');
    }

    public function getWhatsappUrlAttribute(): string
    {
        $phone = '6281298506111';
        $message = $this->cta_whatsapp_text ?: "Halo NazwaGraha Pratama, saya ingin konsultasi dan memesan {$this->name} dari website.";
        return 'https://wa.me/' . $phone . '?text=' . urlencode($message);
    }
}
