<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    protected $table='solicitudes';
    protected $primaryKey='id_solicitud';
    protected $with=['usuario','destino'];

    public $timestamps=true;
    public $incrementing=true;

    public $fillable=[
    	'fecha_solicitud',
        'hora_solicitud',
    	'fecha_uso',
        'hora_uso',
        'id_destino',
    	'estatus_solicitud',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'curp','curp');
    }
    public function destino()
    {
        return $this->belongsTo(Destino::class, 'id_destino','id_destino');
    }
}
