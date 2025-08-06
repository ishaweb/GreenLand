<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{

    protected $table = "customers";
    protected $fillable = ["name","Email","contact","address","postalCode","Payment"];

    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}

