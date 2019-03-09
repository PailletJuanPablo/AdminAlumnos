<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clase extends Model
{
    protected $table = 'clases';
    public $timestamps = true;


    protected $fillable = array('fecha', 'nombre', 'actividad_id');

    public function actividad()
    {
        return $this->belongsTo('App\Actividad');
    }

    public function alumnos()
    {
        return $this->belongsToMany('App\Alumno');
    }
}
