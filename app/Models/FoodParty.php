<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FoodParty extends Pivot
{

    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class);
    }
    protected $fillable =[
      'start_time',
      'end_time',
      'name',
    ];
}
