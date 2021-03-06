<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey="id";
    protected $fillable=["user_id","category_name","deleted_at"];
    public $timestamps=true;

    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }

}
