<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this -> id,
            'title' => $this -> title,
            'content' => $this -> content,
            'is_public' => boolval($this -> is_public),
            'author_id' => $this -> author_id,
            'created_at' => Carbon::parse($this -> created_at) -> toDateTimeString(),
            'updated_at' => Carbon::parse($this -> updated_at) -> toDateTimeString(),
            'categories' => CategoryResource::collection($this -> whenLoaded('categories'))
        ];
    }
}
