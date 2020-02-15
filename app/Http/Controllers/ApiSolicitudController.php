<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use DB;
class ApiSolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Solicitud::all();
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

        $solicitud = new Solicitud;
        $solicitud->id_solicitud=$request->get('id_solicitud');                          //base de 
        $solicitud->fecha_solicitud=$request->get('fecha_solicitud');
        $solicitud->hora_solicitud=$request->get('hora_solicitud');
        $solicitud->fecha_uso=$request->get('fecha_uso');
        $solicitud->hora_uso=$request->get('hora_uso');
        $solicitud->id_destino=$request->get('id_destino');
        $solicitud->estatus_solicitud=$request->get('estatus_solicitud'); 
        $solicitud->curp=$request->get('curp');
        $solicitud->save();
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
        return $solicitud = Solicitud::find($id);
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
        
        $solicitud = Solicitud::find($id);
        $solicitud->fecha_solicitud=$request->get('fecha_solicitud');
        $solicitud->hora_solicitud=$request->get('hora_solicitud');
        $solicitud->fecha_uso=$request->get('fecha_uso');
        $solicitud->hora_uso=$request->get('hora_uso');
        $solicitud->id_destino=$request->get('id_destino');
        $solicitud->estatus_solicitud=$request->get('estatus_solicitud');
        $solicitud->curp=$request->get('curp');
        $solicitud->update();
        // Solicitud::findOrfail($id)->update($request->all());
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
        return Solicitud::destroy($id);
    }
}
