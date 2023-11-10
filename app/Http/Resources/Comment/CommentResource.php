<?php

namespace App\Http\Resources\Comment;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author'=>$this->user->name,
            'content'=>$this->content,
            'food'=>$this->food->name,
            'score'=>$this->restaurant->score,
            'created_at'=>$this->created_at,
        ];
    }
}
