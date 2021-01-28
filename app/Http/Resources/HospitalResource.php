<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class HospitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $arr = parent::toArray($request);
        $arr['like'] = $this->when($this->users->contains($request->user()), true);
        return $arr;
    }
}
