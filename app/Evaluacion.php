<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = array('alumno_id', 'fecha', 'tipo', 'observaciones');

    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
    }


}
