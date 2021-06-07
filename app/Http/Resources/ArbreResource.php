<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Arbre;
use App\Element;

use App\Http\Resources\ElementResource;
class ArbreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'id'        => $this->id,
        'name'     => $this->name,
        'element'    => ElementResource::collection($this->whenLoaded('elements')),
    ];
    }
}
