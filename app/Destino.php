<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    //
    protected $table='destinos';
    protected $primaryKey='id_destino';

    public $timestamps=false;
    public $incrementing=true;

    public $fillable=[
    	'nombre',
    	'distancia'
    ];
}
