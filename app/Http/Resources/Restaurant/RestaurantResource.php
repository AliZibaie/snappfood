<?php

namespace App\Http\Resources\Restaurant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'address' => $this->address,
            'score' => $this->score,
            'phone' => $this->phone,
            'account_number' => $this->account_number,
            'is_open' => (bool) $this->status,
            'open_time' => $this->open_time,
            'close_time' => $this->close_time,
        ];
    }
}
