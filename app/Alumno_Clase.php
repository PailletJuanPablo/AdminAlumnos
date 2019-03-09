<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_Clase extends Model
{
    protected $table = 'asistencias';
    public $timestamps = true;


    protected $fillable = array('alumno_id', 'clase_id', 'asistio', 'observaciones');

    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
    }

    public function clase()
    {
        return $this->belongsTo('App\Clase');
    }
}
