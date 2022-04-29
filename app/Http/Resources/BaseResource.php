<?php

namespace App\http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource {

    public function with($request){
        return[
            'error' => null
        ];
    }
}