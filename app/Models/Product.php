<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','price','sale_price','image','description','status','category_id'];
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function   images()
    {
        return $this->hasMany(ImgProducts::class);
    }
}
