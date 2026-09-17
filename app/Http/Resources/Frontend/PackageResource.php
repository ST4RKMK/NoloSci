<?php

namespace App\Http\Resources\Frontend;

use App\Models\Admin\Catalog;
use App\Models\System\Package;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        $data=[
            'title'=>$this->name,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'from'=>$this->available_from->format('d/m/Y'),
            'to'=>$this->available_to->format('d/m/Y'),
            'children'=>$this->from->map(function($e){
                return match(true){
                    $e->toable instanceof Package=>(new PackageResource($e->toable))->resolve(),
                    $e->toable instanceof Catalog=>(new ProductResource($e->toable))->resolve(),
                    default => null,
                };

            }),
            'variants'=>[],
            'type'=>'package'
        ];

        return $data;

    }
}
