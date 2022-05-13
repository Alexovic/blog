<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// la variabile name assumerà il valore della rotta  dinamica in fase di richiesta 
// ad esempio se Jack farà richiesta ricerca per http://localhost:8000/greetings/andrea
// name varrà andrea.

$router->get('/events', 'EventsController@index');
$router->get('/events/{id}', 'EventsController@show'); // mettiamo show 


$router->post('/events', 'EventsController@create');

$router->post('/events/{id}', 'EventsController@update');


// i metodi HTTP disponibili sono diversi 
// utilizzeremo solo questi quattro 
// GET -> per recuperare/leggere una risorsa
// POST -> per scrivere/creare una risosrsa
// PUT -> per modificare una risorsa
// DELETE -> per eliminare una rsosrsa
