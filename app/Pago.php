<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pago extends Model
{
    protected $table = 'pagos';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = array('alumno_id', 'fecha_pago', 'monto_pagado','numero_cuota','observaciones');

  

    public function estudiante()
    {
        return $this->belongsTo('App\Alumno');
    }

 
}
