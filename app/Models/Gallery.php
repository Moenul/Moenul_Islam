<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_id',
        'desc',
        'link',
    ];

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }
}
