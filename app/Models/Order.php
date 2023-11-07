<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id','methodPayment','order_note','Status'];

    public function cus()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
