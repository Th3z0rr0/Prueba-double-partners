<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
    protected $connection = 'mongodb'; 
    protected $collection = 'orders'; 
    protected $primaryKey = '_id'; 
    protected $fillable = [
        'userId',
        'product',
        'quantity',
        'value',
        'total'
    ];
    
}
