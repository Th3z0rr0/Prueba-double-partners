<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $connection = 'mongodb'; 
    protected $collection = 'users'; 
    protected $primaryKey = '_id'; 
    protected $fillable = [
        'name_1',
        'email_unique_index_1',
        'phone_1',
        'email_verified_at_1',
        'password_1'
    ];
    
}
