<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name_group', 'image_path',
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
