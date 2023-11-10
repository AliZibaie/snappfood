<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'food_id',
        'restaurant_id',
        'cart_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
