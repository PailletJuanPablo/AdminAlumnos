@extends('crudbooster::admin_template')

@section('content')

<div id="chart-div">

    @donutchart('IMDB', 'chart-div')

</div>
@endsection

