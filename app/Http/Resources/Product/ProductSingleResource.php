<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Shop\ShopSingleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSingleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->name,
            'shop' => new ShopSingleResource($this->shop),
            'description' => $this->description,
            'created_at' => date('d.m.Y', strtotime($this->created_at)),
        ];
    }
}
