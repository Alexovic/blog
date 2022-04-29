<?php

namespace App\Http\Controllers;


use App\Http\Resources\EventResource;

use App\Models\Event;

use app\Http\Resources\EventCollection;


class EventsController extends Controller {


    public function __construct() {

    }


    public function index(){
        
        $events=Event::all();


        //Utilizzo una risorsa per ritornare il risultato all'utente
        return  new EventCollection($events);
    }

    public function show($id){
        // reucpero il singolo evento utilizzato l'identificativo (ID)

        // il find ritorna un egetto event se esiste.
        //ritorna null altrimenti
        $event = Event::find($id);

        if ($event) { //è true solo se l'oggetto non è null
            return new EventResource($event);
        }
        else {
            return $this->failure('the searched event doasent exists', 1, 404);
        }

        //Ritorno l'evento all'utente
        return $id; 
    }

}
