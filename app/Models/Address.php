<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;
    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
    protected $visible = [
        'id',
        'title',
        'address',
        'latitude',
        'longitude',
    ];
    protected $fillable = [
        'title',
        'address',
        'latitude',
        'longitude',
    ];
}