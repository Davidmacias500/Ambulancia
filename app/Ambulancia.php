<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulancia extends Model
{
    //
    protected $table='ambulancias';
    protected $primaryKey='id_ambulancia';
    // protected $with=['id_chofer'];

    public $timestamps=false;
    public $incrementing=true;

    public $fillable=[
    	'placa',
    	'kilometraje',
    	'gasolina',
    ];
//     public function chofer()
//     {
//         return $this->belongsTo(Chofer::class, 'id_ambulancia','id');
//     }
}
