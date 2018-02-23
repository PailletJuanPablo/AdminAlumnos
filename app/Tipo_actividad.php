<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tipo_actividad extends Model
{
    protected $table = 'tipos_actividad';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = array('nombre', 'descripcion');

    public function cursos()
    {
        return $this->hasMany('App\Actividad');
    }


}
