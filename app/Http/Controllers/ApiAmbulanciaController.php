<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ambulancia;
class ApiAmbulanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Ambulancia::all();
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
        $ambulancia = new Ambulancia;
        $ambulancia->id_ambulancia=$request->get('id_ambulancia');                          //base de 
        $ambulancia->placa=$request->get('placa');
        $ambulancia->kilometraje=$request->get('kilometraje');
        $ambulancia->gasolina=$request->get('gasolina'); 
        $ambulancia->id_chofer=$request->get('id_chofer');
        $ambulancia->save();
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
         return $ambulancia= Ambulancia::find($id);
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
        $ambulancia= Ambulancia::find($id);
        $ambulancia->id_ambulancia=$request->get('id_ambulancia');                          //base de 
        $ambulancia->placa=$request->get('placa');
        $ambulancia->kilometraje=$request->get('kilometraje');
        $ambulancia->gasolina=$request->get('gasolina'); 
        $ambulancia->id_chofer=$request->get('id_chofer');
        $ambulancia->update();
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
        return Ambulancia::destroy($id);
    }
}
