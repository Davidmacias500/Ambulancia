<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chofer;
class ApiChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Chofer::all();
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
        $chofer = new Chofer;
        $chofer->id_chofer=$request->get('id_chofer');                          //base de 
        $chofer->nombre=$request->get('nombre');
        $chofer->apellidop=$request->get('apellidop');
        $chofer->apellidom=$request->get('apellidom'); 
        $chofer->celular=$request->get('celular');
        $chofer->save();
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
        return $chofer= Chofer::find($id);
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
        $chofer= Chofer::find($id);
        $chofer->id_chofer=$request->get('id_chofer');                          //base de 
        $chofer->nombre=$request->get('nombre');
        $chofer->apellidop=$request->get('apellidop');
        $chofer->apellidom=$request->get('apellidom'); 
        $chofer->celular=$request->get('celular');
        $chofer->update();

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
        return Chofer::destroy($id);
    }
}
