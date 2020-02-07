<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use Session;
use Redirect;
use Cache;
use Cookie;
class AccesoController extends Controller
{
    public function validar(Request $request){
    	// return 'HOLA';

    	// return Usuario::all();
    	$usuario=$request->usuario;
    	$password=$request->password;

    	$resp= Cuenta::where('usuario', '=',$usuario)
    	->where('password','=', $password)
		->get();
        $user =$resp[0]->nombre.' '.$resp[0]->apellidop;

		// return $resp;
        if (count($resp)>0){
            session::put('usuario',$user);
            session::put('rol',$resp[0]->rol);
   

            if($resp[0]->rol=="Administrador")
              return Redirect::to('admin');
            }

            else
                return "Usuario y Contraseña incorrecta";
            
    }

    public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);

        return Redirect::to('/');
    }
}
