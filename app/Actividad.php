<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Actividad extends Model
{
    
    protected $table = 'actividades';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = array('nombre', 'descripcion', 'tipo_actividad_id', 'imagen', 'observaciones');



    public function alumnos()
    {
        return $this->hasMany('App\Alumno');
    }

    public function tipo_actividad()
    {
        return $this->belongsTo('App\Tipo_actividad');
    }

}
