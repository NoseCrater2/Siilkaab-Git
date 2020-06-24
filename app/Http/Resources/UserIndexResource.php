<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserIndexResource extends JsonResource
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
            'name' => $this->name.' '.$this->last_name,
            'email' => $this->email,
            'type' => $this->type,
            'language' => $this->language,
            'timezone' => $this->timezone,
            'currency_id'=> isset($this->currency)?$this->currency->id:null,
            'currency'=> isset($this->currency)?$this->currency->name:null,
        ];
    }
}
