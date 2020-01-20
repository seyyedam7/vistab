<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'price', 'image_path',
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    public function likes() {
        return $this->hasMany('App\Like');
    }
    public function season()
    {
        return $this->hasMany('App\Season');
    }
}
