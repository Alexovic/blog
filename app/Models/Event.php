<?php

namespace App\Models;
  

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $fillable = [

        'name', 

        'description',

        'date',

        'cover_url',

        'price',

        'address',

        'lat',

        'lng',

        'views_count',

        'comments_count',

        'likes_count',
    ];


}