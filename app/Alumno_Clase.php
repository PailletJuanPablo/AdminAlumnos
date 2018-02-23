<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_Clase extends Model
{
    protected $table = 'alumnos_clases';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = array('alumno_id', 'clase_id', 'asistio','observaciones');

    public function alumnos()
{
    return $this->belongsToMany('App\Alumno');
    
}

public function clase()
{
    return $this->belongsToMany('App\Clase');
    
}


}
