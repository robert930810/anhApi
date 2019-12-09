<?php
use App\Models\Plantilla;
use Illuminate\Http\Request;
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

//CRUD

$router->get('plantillas', [
    'as' => 'plantillas.index', 
    'uses' => 'PlantillasController@index'
]);

$router->post('plantillas', [
    'as' => 'plantillas.store', 
    'uses' => 'PlantillasController@store'
]);

$router->get('plantillas/{id}', [
    'as' => 'plantillas.show', 
    'uses' => 'PlantillasController@show'
]);

$router->put('plantillas/{id}', [
    'as' => 'plantillas.update', 
    'uses' => 'PlantillasController@update'
]);

$router->delete('plantillas/{id}', [
    'as' => 'plantillas.delete', 
    'uses' => 'PlantillasController@destroy'
]);