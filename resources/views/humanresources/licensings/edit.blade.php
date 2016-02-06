@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Licencia</h5>

{!! Form::open(['action' => 'HumanResources\LicensingController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('licensing_id', $licensing->id) !!}

  @include('humanresources.licensings.form')	

{!! Form::close() !!}

@endsection