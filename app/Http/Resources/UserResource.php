<?php

namespace App\Http\Resources;



class UserResource extends BaseResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'email'=>$this->email,
            'password'=>$this->password,
            'authToken'=>$this->authToken,
            'firstName'=>$this->firstName,
            'lastName'=>$this->lastName,
            'birthData'=>$this->birthDate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}