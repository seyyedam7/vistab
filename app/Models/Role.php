<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'title'
    ];

    protected $table = 'roles';

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
