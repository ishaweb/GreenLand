<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProduct;
use App\Models\User;
use App\Models\Customer;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ["user_id","Amount","status","order_status","strip_id","customer_id"];
    // product Table
    public function products()
    {
         return $this->hasMany(OrderProduct::class); 
    }
    // user 
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    
}
