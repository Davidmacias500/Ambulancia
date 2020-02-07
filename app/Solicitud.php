<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    protected $table='solicitudes';
    protected $primaryKey='id_solicitud';
    protected $with=['usuario'];

    public $timestamps=true;
    public $incrementing=true;

    public $fillable=[
    	'fecha_solicitud',
        'hora_solicitud',
    	'fecha_uso',
        'hora_uso',
    	'estatus_solicitud',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'curp','curp');
    }
}
