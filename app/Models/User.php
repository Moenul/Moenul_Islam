<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'title',
        'email',
        'password',
        'role_id',
        'photo_id',
        'device_token',
        'provider',
        'provider_id',
        'provider_token',
    ];



    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function isAdmin()
    {
        if($this->role->name  == 'Administrator'){
            return true;
        }

        return false;
    }

    public function isModerator()
    {
        if($this->role->name  == 'Moderator'){
            return true;
        }

        return false;
    }

    public function isSubscriber()
    {
        if($this->role->name  == 'Subscriber'){
            return true;
        }

        return false;
    }

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
