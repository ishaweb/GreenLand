<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    //
    protected $table = "designs";
    protected $fillable = ["image","name","image2","Description","design"];
}
