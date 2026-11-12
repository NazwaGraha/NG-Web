<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $table = 'service_pages';

    protected $fillable = [
        'slug',
        'service_title',
        'eyebrow',
        'hero_h1',
        'hero_lead',
        'hero_image',
        'hero_badges',
        'pricing_packages',
        'comparison_data',
        'faq_items',
        'meta_title',
        'meta_description',
        'focus_keyword',
        'is_active',
    ];

    protected $casts = [
        'hero_badges' => 'array',
        'pricing_packages' => 'array',
        'comparison_data' => 'array',
        'faq_items' => 'array',
        'is_active' => 'boolean',
    ];
}
