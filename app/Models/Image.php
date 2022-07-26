<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table="imagable";
    protected $primaryKey="image_id";
    protected $fillable=["image_foreign_id","image_name","imagable_name","imagable_type","imagable_id","image_path"];
    public $timestamps=true;

    function imagable(){
        return $this->morphTo(Brand::class,"imagable_type","imagable_id","image_id");
    }
}
