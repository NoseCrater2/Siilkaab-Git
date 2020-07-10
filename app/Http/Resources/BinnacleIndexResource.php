<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BinnacleIndexResource extends JsonResource
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
            'user' => $this->user,
            'action' => $this->action,
            'model' => $this->model,
            'ip' =>$request->ip(),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
