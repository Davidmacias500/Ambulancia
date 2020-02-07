<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destino;
class ApiDestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Destino::all();
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
        $destino = new Destino;
        $destino->id_destino=$request->get('id_destino');                          //base de 
        $destino->nombre=$request->get('nombre');
        $destino->distancia=$request->get('distancia');
        $destino->save();
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
        return $destino = Destino::find($id);
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
        $destino = Destino::find($id);
        $destino->id_destino=$request->get('id_destino');                          //base de 
        $destino->nombre=$request->get('nombre');
        $destino->distancia=$request->get('distancia');
        $destino->update();
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
        return Destino::destroy($id);
    }
}
