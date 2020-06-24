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
            //'Url' => $this->url,
            'reference_code' => $this->reference_code,
            //'Image' => $this->image,
            //'LargeText' => $this->large_text,
            'shortText' => $this->short_text,
        ];
    }
}
