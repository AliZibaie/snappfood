<?php

namespace App\Models;

use App\Casts\ExpireTime;
use App\Casts\Status;
use App\Models\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $casts = [
        'status'=>Status::class,
    ];
    protected $fillable = [
        'code',
        'expire_time',
        'amount',
        'code',
    ];
    protected static function booted(): void
    {
        static::addGlobalScope(new StatusScope());
    }
}
