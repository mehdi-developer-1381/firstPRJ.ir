<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=["brand_name","brand_image"];
    protected $primaryKey="brand_id";

    function image(){
        return $this->morphOne(Image::class,"imagable","imagable_type","imagable_id","brand_id");
    }
}
