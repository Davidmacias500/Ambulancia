<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    //
    protected $table='viajes';
    protected $primaryKey='id_viaje';
    protected $with=['ambulancia','destino','chofer'];

    public $timestamps=false;
    public $incrementing=true;

    public $fillable=[
    	'personas',
        'fecha_viaje',
        'hora_viaje'
    ];

     public function ambulancia()
    {
        return $this->belongsTo(Ambulancia::class, 'id_ambulancia','id_ambulancia');
    }
     public function destino()
    {
        return $this->belongsTo(Destino::class, 'id_destino','id_destino');
    }
    public function chofer()
    {
        return $this->belongsTo(Chofer::class, 'id_chofer','id_chofer');
    }
}
