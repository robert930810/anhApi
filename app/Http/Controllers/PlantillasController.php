<?php

namespace App\Http\Controllers;

use App\Models\Plantilla;
use Illuminate\Http\Request;

class PlantillasController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantillas = Plantilla::all();

        return $this->responseSuccess($plantillas);
    }

    /**
     * Store and validate newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPlantilla = new Plantilla();
        $newPlantilla->nombre=$request->input('nombre');
        $newPlantilla->idTipoPlantilla=$request->input('idTipoPlantilla');
        $newPlantilla->descripcion=$request->input('descripcion');
        $newPlantilla->contenido=$request->input('contenido');

        if($newPlantilla->save()){
            return response()->json($newPlantilla);
        }else{
            return response()->json("error");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plantilla = Plantilla::findOrFail($id);

        return $this->responseSuccess($plantilla);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $plantilla = Plantilla::findOrFail($id);

        if($plantilla != null){
            
            $plantilla->nombre=$request->input('nombre')==null?$plantilla->nombre:$request->input('nombre');
            $plantilla->descripcion=$request->input('descripcion')==null?$plantilla->descripcion:$request->input('descripcion');
            $plantilla->contenido=$request->input('contenido')==null?$plantilla->contenido:$request->input('contenido');
            $plantilla->idTipoPlantilla=$request->input('idTipoPlantilla')==null?$plantilla->idTipoPlantilla:$request->input('idTipoPlantilla');
            
            $plantilla->save();
            return response()->json($plantilla);
        }else{
            return response()->json("no se encontró una plantilla");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plantilla = Plantilla::findOrFail($id);

        $plantilla->delete();

        return $this->responseSuccess();
    }
}