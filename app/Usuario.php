<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table='solicitantes';
    protected $primaryKey='curp';
    //protected $with=['id_vendedor','id_tienda'];

    public $timestamps=false;
    public $incrementing=false;

    public $fillable=[
    	'curp',
    	'nombre',
    	'apellidop',
    	'apellidom',
    	'direccion',
        'referencia',
        'celular',
        'foto_credencial',
        'foto_curp',
        'foto_recibo_luz'
    ];
}
