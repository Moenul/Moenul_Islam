<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_icon',
        'service_name',
        'service_desc',
        'service_title',
        'service_type',
        'service_component_title',
        'service_components',
    ];
}
