@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Licencia</h3>

{!! Form::open(['action' => 'HumanResources\LicensingController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('licensing_id', $licensing->id) !!}

  @include('humanresources.licensings.form')	

{!! Form::close() !!}

@endsection