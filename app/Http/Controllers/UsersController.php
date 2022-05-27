<?php

namespace App\Http\Controllers;


use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller {


    public function __construct() {

    }


    public function index(){
        
        $users=User::all();


        //Utilizzo una risorsa per ritornare il risultato all'utente
        return  new UserCollection($users);
    }

    public function show($id){
        // reucpero il singolo evento utilizzato l'identificativo (ID)

        // il find ritorna un egetto event se esiste.
        //ritorna null altrimenti
        $users = User::find($id);

        if ($users) { //è true solo se l'oggetto non è null
            return new UserResource($users);
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
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:16',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'birthDate' => 'required|date',
            'city' => 'required|string',
        ]);
        $users = new User($request->all());
        $users->authToken = Str::random(60);
        $users->password = Hash::make($request->password);
        $users->save();

    return new UserResource($users);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6|max:16',
            'firstName'=>'required|string',
            'lastName'=>'required|string',
            'birthDate'=>'required|date',
            'city'=>'required|string',

        ]);

        $users = User::find($id);
        if(!$users){
            return $this->failure("The event does not exist", 1, 404);
        }
        $users->update($request->all());
        return new UserResource($users);
        }

        public function delete($id){
            $users = User::find($id);
            if (!$users){
                return $this->failure("The event does not exist", 1, 404);
            }
            $users->delete();
            return new UserCollection($users::all());
        }
}