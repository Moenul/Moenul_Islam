<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model implements Viewable
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
