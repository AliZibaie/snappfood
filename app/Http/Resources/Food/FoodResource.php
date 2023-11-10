<?php

namespace App\Http\Resources\Food;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'category' => [
                $this->foodCategory->food_type,
                'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'raw_material' => $this->raw_material,
            ],
            'image' => $this->image,
//            'off' => $this->when($this->off, [
//                'label' => $this->off->label,
//                'factor' => $this->off->factor,
//            ]),
        ];
    }
}
