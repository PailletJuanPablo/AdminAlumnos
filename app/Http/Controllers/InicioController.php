<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Laravel\LavachartsFacade as Lava;
use App\Actividad;
use App\Alumno;
class InicioController extends Controller
{
    public function index()
    {
        $reasons = Lava::DataTable();

        $actividades = Actividad::all();
        $reasons->addStringColumn('Curso')
        ->addNumberColumn('Numeros');

        foreach($actividades as $actividad){
            $reasons->addRow([$actividad->nombre,$actividad->alumnos->count()]);
        }
      

        Lava::DonutChart('IMDB', $reasons, [
    'title' => 'Alumnos por Curso'
]);
    
        return view('inicio')->with($donutchart);
    }

}
