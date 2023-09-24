<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'tags',
        'cat_id',
        'type',
        'views',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id');
    }

}
