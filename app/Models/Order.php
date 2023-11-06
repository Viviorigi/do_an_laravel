<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id','methodPayment','order_note'];
    public function cus()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
