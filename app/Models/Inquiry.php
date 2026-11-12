<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'whatsapp',
        'email',
        'service_name',
        'company_name',
        'budget_range',
        'message',
        'status',
        'ip_address',
        'user_agent',
    ];
}
