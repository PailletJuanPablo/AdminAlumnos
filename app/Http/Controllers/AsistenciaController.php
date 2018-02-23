<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use CRUDBooster;
class AsistenciaController extends Controller
{
      public function index($estado, $id)
  {
    DB::table('asistencias')->where('id',$id)->update(['asistio'=>$estado]);

    CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Actualizado correctamente!","info");
  }
}
