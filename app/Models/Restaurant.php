<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Restaurant extends Model
{
    use HasFactory;
    public function restaurantCategory(): BelongsTo
    {
        return $this->belongsTo(RestaurantCategory::class);
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function foodCategories(): BelongsToMany
    {
        return $this->belongsToMany(FoodCategory::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }
    protected $fillable = [
        'name',
        'phone',
        'account_number',
        'sending_price',
        'restaurant_category_id',
        'user_id',
        'open_time',
        'close_time',
    ];



}
