<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','password','tel', 'image_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function like()
    {
        return $this->hasMany('App\Like');
    }
    public function Target()
    {
        return $this->hasMany('App\Target');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function course()
    {
        return $this->belongsToMany('App\Course');
    }
    public function group()
    {
        return $this->belongsToMany('App\Group');
    }

}
