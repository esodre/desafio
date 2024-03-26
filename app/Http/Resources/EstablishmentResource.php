<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstablishmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'product' => ProductResource::make($this->whenLoaded('product')),
        ];
    }
}
