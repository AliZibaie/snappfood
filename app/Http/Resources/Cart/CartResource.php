<?php

namespace App\Http\Resources\Cart;

use App\Http\Resources\Food\FoodCollection;
use App\Http\Resources\Food\FoodResource;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'id'=> $this->id,
                'restaurant'=>$this->restaurant,
                'foods'=>$this->food,
                'created_at'=> $this->created_at,
                'updated_at'=> $this->updated_at,

        ];
    }
}
