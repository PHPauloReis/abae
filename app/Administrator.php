<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrator extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'access_level'
    ];

    use SoftDeletes;
}
