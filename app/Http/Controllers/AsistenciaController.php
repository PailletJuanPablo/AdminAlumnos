<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use CRUDBooster;
use Auth;
use App\Alumno;
use App\Clase;
use App\Alumno_Clase;
use App\Actividad;

class AsistenciaController extends Controller
{

  public function __construct()
  {
    $this->actividad_id;
    $this->clases;
  }

  public function index($estado, $id)
  {
    DB::table('asistencias')->where('id', $id)->update(['asistio' => $estado]);
    CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Actualizado correctamente!", "info");
  }

  public function interactive()
  {
    $id = CRUDBooster::myId();
    $user = DB::table('cms_users')->find($id);
    $curso = Actividad::find($user->actividad_id);
    $clases = Clase::where('actividad_id', $user->actividad_id)->get();
    $this->clases = $clases;
    $alumnos =
      Alumno::with(
        [
          'asistencias' => function ($query) {
            $query->whereIn('clase_id', $this->clases->pluck('id')
          );
          },
          'asistencias.clase'
        ]
      )
      ->orderBy('apellido', 'asc')
      ->where('actividad_id', $curso->id)->get();

    $asistencias = Alumno_Clase::with('alumno', 'clase')->whereIn('clase_id', $clases->pluck('id'))
    
    ->get();

    return view('asistencias.interactive', [
      "clases" => $clases,
      "user" => $user,
      "asistencias" => $asistencias,
      "curso" => $curso,
      "alumnos" => $alumnos
    ]);
  }


  public function ajax(Request $request){

    $asistencia = Alumno_Clase::find($request->asistenciaId);

    if($asistencia->asistio == 'SI'){
      $asistencia->asistio = 'NO';
    } else {
      $asistencia->asistio = 'SI';
    };

    $asistencia->save();

    return response()->json($asistencia);

  }


  public function gestionAdmin($id){
    $curso = Actividad::find($id);
    $clases = Clase::where('actividad_id', $id)->get();
    $this->clases = $clases;
    $alumnos =
      Alumno::with(
        [
          'asistencias' => function ($query) {
            $query->whereIn('clase_id', $this->clases->pluck('id')
          );
          },
          'asistencias.clase'
        ]
      )
      ->where('actividad_id', $curso->id)->get();

    $asistencias = Alumno_Clase::with('alumno', 'clase')->whereIn('clase_id', $clases->pluck('id'))
    
    ->get();

    return view('asistencias.interactive', [
      "clases" => $clases,
      "asistencias" => $asistencias,
      "curso" => $curso,
      "alumnos" => $alumnos
    ]);
  }

}
