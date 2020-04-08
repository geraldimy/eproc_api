<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class promo extends JsonResource
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
            'promo_title' => $this->promo_title,
            'image' => $this->image,
        ];
    }
}
