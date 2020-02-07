<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    //
    protected $table='usuarios';
    protected $primaryKey='id_cuenta';
    public $incrementing =true;
    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    	'apellidop',
        'apellidom',
        'celular',
        'usuario',
        'password',
        'rol',
    ];
}
