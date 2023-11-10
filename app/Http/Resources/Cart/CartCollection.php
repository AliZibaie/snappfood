<?php

namespace App\Http\Resources\Cart;

use App\Http\Resources\Food\FoodResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CartCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'carts' => $this->collection,
        ];
    }
}
