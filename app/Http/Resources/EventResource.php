<?php

namespace App\Http\Resources;



class EventResource extends BaseResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'date'=>$this->date,
            'cover_url'=>$this->cover_url,
            'address'=>$this->address,
            'price'=>$this->price,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}