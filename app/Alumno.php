<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    
    protected $table = 'alumnos';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = array('nombre', 'apellido', 'telefono', 'mail', 
    'ciudad', 'procedencia', 'observaciones','condicion', 
    'actividad_id','localidad_convenio', 'titulo_profesional', 'numero_matricula', 'presento_tif','domicilio','dni');


    public function pago()
    {
        return $this->hasMany('App\Pago');
    }

    public function evaluacion()
    {
        return $this->hasMany('App\Evaluacion');
    }

    public function actividad()
    {
        return $this->belongsTo('App\Actividad');
    }

    public function asistencias(){
        return $this->hasMany('App\Alumno_clase', 'alumno_id');
    }

}
