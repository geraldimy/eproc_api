<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'product_name' => $this->product_name,
            'short_desc' => $this->short_desc,
            'color' => $this->color,
            'image' => $this->image,
        ];
    }
}
