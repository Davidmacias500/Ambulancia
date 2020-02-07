<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
class ApiUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Usuario::all();

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
        $usuario = new Usuario;
        $usuario->curp=$request->get('curp');  
        $usuario->nombre=$request->get('nombre');
        $usuario->apellidop=$request->get('apellidop');
        $usuario->apellidom=$request->get('apellidom');
        $usuario->direccion=$request->get('direccion');
        $usuario->referencia=$request->get('referencia');
        $usuario->celular=$request->get('celular');
        $usuario->foto_credencial=$request->get('foto_credencial'); 
        $usuario->foto_curp=$request->get('foto_curp'); 
        $usuario->foto_recibo_luz=$request->get('foto_recibo_luz'); 
        $usuario->save();
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
        return $usuario = Usuario::find($id);
    
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
        $usuario = Usuario::find($id);
        $usuario->curp=$request->get('curp');  
        $usuario->nombre=$request->get('nombre');
        $usuario->apellidop=$request->get('apellidop');
        $usuario->apellidom=$request->get('apellidom');
        $usuario->direccion=$request->get('direccion');
        $usuario->referencia=$request->get('referencia');
        $usuario->celular=$request->get('celular');
        $usuario->foto_credencial=$request->get('foto_credencial'); 
        $usuario->foto_curp=$request->get('foto_curp'); 
        $usuario->foto_recibo_luz=$request->get('foto_recibo_luz'); 
        
        $usuario->update();

        // Usuario::findOrfail($id)->update($request->all());
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
        return Usuario::destroy($id);
    }

}
