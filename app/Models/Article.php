<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;
    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
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
