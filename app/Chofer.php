<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    //
    protected $table='choferes';
    protected $primaryKey='id_chofer';
    //protected $with=['id_vendedor','id_tienda'];

    public $timestamps=false;
    public $incrementing=true;

    public $fillable=[
    	'nombre',
    	'apellidop',
    	'apellidom',
    	'celular',
    ];
}
