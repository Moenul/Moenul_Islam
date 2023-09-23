<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;


    protected $uploads = '/images/';

    protected $fillable = ['file'];

    public function getFileAttribute($photo)
    {
        return $this->uploads . $photo;
    }
}
