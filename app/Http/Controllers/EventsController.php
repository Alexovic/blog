<?php

namespace App\Http\Controllers;


use App\Http\Resources\EventResource;

use App\Models\Event;

use App\Http\Resources\EventCollection;

use Illuminate\Http\Request;


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

        // Questi sono due modi per fare la stessa cosa.
        // Ovvero creare un evento passando i parametri
        // presenti nel body della richiesta

        // $event = new Event();
        // $event->name = $request->name;
        // $event->descr
// Tutte le chiamate POST E PUT
    // utilizzano la request per recuperare i dati
    // presenti nel body della richiesta.
    public function create(Request $request) {
        $this->validate($request,[
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'date' => 'required|date',
            'cover_url' => 'required|url',
            'price' => 'required|numeric',
            'address' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'views_count' => 'required|integer',
            'comments_count' => 'required|integer',
            'likes_count' => 'required|integer'
        ]);
        $event = new Event($request->all());
        $event->save();

    return new EventResource($event);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name'=>'string|min:3',
            'description'=>'string',
            'date'=>'date',
            'cover_url'=>'url',
            'price'=>'numeric',
            'address'=>'string',
            'lat'=>'numeric',
            'lng'=>'numeric',
            'views_count'=>'integer',
            'comments_count'=>'integer',
            'likes_count' =>'integer',

        ]);

        $event = Event::find($id);
        $event->update($request->all());
        return new EventResource($event);
        }
}
