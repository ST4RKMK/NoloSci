<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        $data=[
            'title'=>$this->resource->name??'',
            'price'=>$this->resource->price??'',
            'from'=>null,
            'to'=>null,
            'discount'=>null,
            'children'=>[],
            'variants'=>$this->resource->extend->meta,
            'type'=>'product'
        ];

        return $data;

    }
}
