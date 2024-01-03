<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'content_bn',
        'tags',
        'cat_id',
        'type',
        'views',
        'read_time',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
