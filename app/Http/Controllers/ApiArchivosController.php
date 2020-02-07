<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use DB;
class ApiArchivosController extends Controller
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

        $curp=$request->get('curp');

        $usuario=Usuario::find($id);
        // $empresa->nombre_empresa=$request->get('nombre_empresa');
        $fotoine=$request->file('foto_credencial');
        $fotocurp=$request->file('foto_curp');
        $fotorecibo=$request->file('foto_recibo_luz');
        //El nombre foto se asigna de acuerdo a la clave primaria de la tabla,
        //en este caso id_mascota
        //se obtiene el id como nombres
        $usuario->fotoine=$id.'.pdf';
        $usuario->fotocurp=$id.'.pdf';
        $usuario->fotorecibo=$id.'.pdf';
        //Se guarda la foto con base a la clave primaria de la tabla users2
        $fotoine->move(public_path().'/archivos/ine',$id.'.pdf');
        $fotocurp->move(public_path().'/archivos/curp',$id.'.pdf');
        $fotorecibo->move(public_path().'/archivos/recibo',$id.'.pdf');

        $usuario->update();
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
    }
}
