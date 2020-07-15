<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelShowResource extends JsonResource
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
            'idConfiguration' => isset ($this->configuration) ? $this->configuration->id : null,
            'idContact' => isset ($this->contact) ? $this->contact->id : null,
            'idCondition' => isset ($this->condition) ? $this->condition->id : null,
            'idRegime' => isset ($this->regime) ? $this->regime->id : null,
            'idAmenity' => isset ($this->amenity) ? $this->amenity->id : null,
            'Title' => $this->title,
            'Url' => $this->url,
            'ReferenceCode' => $this->reference_code,
            'Image' => $this->image,
            'LargeText' => $this->large_text,
            'ShortText' => $this->short_text,
        ];
    }
}
