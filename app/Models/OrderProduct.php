<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\plant;
use App\Models\Order;
class OrderProduct extends Model
{
    protected $table = "order_products";
    
    protected $fillable = ["order_id","product_id","Amount","quantity","price"];   
    
    public function product()
    {
        return $this->belongsTo(plant::class , 'product_id');
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
}
