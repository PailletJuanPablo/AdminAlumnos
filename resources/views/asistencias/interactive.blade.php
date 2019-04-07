@extends('crudbooster::admin_template') 
@section('content')

<div>
    <div class="card">
            <h4> Gestionando asistencias del curso {{$curso->nombre}} </h4>
            @if(count($clases) == 0)
                <h3 style="font-weight: bold; color: red"> Para poder gestionar las asistencias es necesario agregar clases en el apartado "Clases" </h3>
            
            @endif
    </div>
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <td>

                </td>
                @foreach ($clases as $clase)
                <td>
                    <p>
                        {{$clase->fecha}}
                    </p>
                    <h6>
                        {{$clase->observaciones}}
                    </h6>
                </td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td>
                    {{$alumno->apellido}}, {{$alumno->nombre}}
                </td>
                @foreach ($alumno->asistencias as $asistencia)
                <td>
                    Asistió: @if ($asistencia->asistio == 'SI')
                    <input type="checkbox" onclick="updateAsistencia(this.name)" name="{{$asistencia->id}}" checked> <br>                    @else
                    <input type="checkbox" onclick="updateAsistencia(this.name)" name="{{$asistencia->id}}"> @endif
                    <div id="loader-{{$asistencia->id}}" class="loader hide">
                       <span style="font-size: 10px">  Guardando... </span>
                    </div>
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        $( document ).ready(function() {
            console.log( "ready!" );
         });
    });

    const updateAsistencia = (asistenciaId) => {
        $('#loader-'+asistenciaId).removeClass('hide');
        $.post( "{{ route('update_asistencia')}}", { asistenciaId })
            .done(function( data ) {
                console.log(data);
                $('#loader-'+asistenciaId).addClass('hide');
            })
            .fail(function() {
                alert( "Error actualizando. Intente más tarde" );
                $('#loader-'+asistenciaId).addClass('hide');
            });
    }

</script>
@endsection