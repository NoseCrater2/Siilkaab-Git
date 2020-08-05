<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class HotelIndexResource extends JsonResource
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
            'title' => $this->title,
            'reference_code' => $this->reference_code,
            'rooms' => $this->rooms->count(),
            'rates' => $this->rates->count(),
            'discounts' => $this->discounts->count(),
            'extras' => $this->extras->count(),
            'enabled' => $this->enabled
        ];
    }
}
