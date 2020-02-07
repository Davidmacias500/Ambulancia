<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
class apiCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Cuenta::all();
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
        $cuenta = new Cuenta;
        $cuenta->id_cuenta=$request->get('id_cuenta');  
        $cuenta->nombre=$request->get('nombre');
        $cuenta->apellidop=$request->get('apellidop');
        $cuenta->apellidom=$request->get('apellidom');
        $cuenta->celular=$request->get('celular'); 
        $cuenta->usuario=$request->get('usuario');
        $cuenta->password=$request->get('password');
        $cuenta->rol=$request->get('rol'); 
        $cuenta->save();
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
        return $cuenta= Cuenta::find($id);
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
        $cuenta= Cuenta::find($id);
        $cuenta->id_cuenta=$request->get('id_cuenta');  
        $cuenta->nombre=$request->get('nombre');
        $cuenta->apellidop=$request->get('apellidop');
        $cuenta->apellidom=$request->get('apellidom');
        $cuenta->celular=$request->get('celular'); 
        $cuenta->usuario=$request->get('usuario');
        $cuenta->password=$request->get('password');
        $cuenta->rol=$request->get('rol'); 
        $cuenta->update();
           
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
        return Cuenta::destroy($id);
    }
}
