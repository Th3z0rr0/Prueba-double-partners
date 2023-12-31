<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $connection = 'mongodb'; 
    protected $collection = 'users'; 
    protected $primaryKey = '_id'; 
    protected $fillable = [
        'name',
        'email',
        'phone',
        'email_verified_at',
        'password'
    ];
    
}
