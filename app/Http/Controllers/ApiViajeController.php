<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viaje;
class ApiViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Viaje::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $viaje = new Viaje;
        $viaje->id_viaje=$request->get('id_viaje');                
        $viaje->personas=$request->get('personas');
        $viaje->fecha_viaje=$request->get('fecha_viaje');
        $viaje->hora_viaje=$request->get('hora_viaje');
        $viaje->id_destino=$request->get('id_destino');
        $viaje->id_ambulancia=$request->get('id_ambulancia'); 
        $viaje->id_chofer=$request->get('id_chofer'); 
        $viaje->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $viaje = Viaje::find($id);
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
        //
        $viaje = Viaje::find($id);
        $viaje->id_viaje=$request->get('id_viaje');                          //base de 
        $viaje->personas=$request->get('personas');
        $viaje->fecha_viaje=$request->get('fecha_viaje');
        $viaje->hora_viaje=$request->get('hora_viaje');
        $viaje->id_destino=$request->get('id_destino');
        $viaje->id_ambulancia=$request->get('id_ambulancia'); 
        $viaje->id_chofer=$request->get('id_chofer');
        $viaje->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Viaje::destroy($id);
    }
}
