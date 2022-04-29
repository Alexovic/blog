<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Laravel\Lumen\Routing\Controller;

class EventsController extends Controller {


    public function __construct() {

    }


    public function index(){
        
        $events=Event::all();


        //Utilizzo una risorsa per ritornare il risultato all'utente
        return EventResource::collection($events);
    }

}
