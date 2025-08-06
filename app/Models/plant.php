<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plant extends Model
{
    //
    protected $table = "plants";
    protected $fillable = ["image","Name","scientificName","Category","quantity","price","Description","stock_Information"];
}