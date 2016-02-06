@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Licencia</h5>

{!! Form::open(['action' => 'HumanResources\LicensingController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.licensings.form')	

{!! Form::close() !!}

@endsection