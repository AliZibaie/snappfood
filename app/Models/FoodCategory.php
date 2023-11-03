<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodCategory extends Model
{
    use HasFactory;
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }
    public function restaurant(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }
    protected $fillable = [
      'food_type',
    ];
}
