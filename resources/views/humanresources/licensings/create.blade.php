@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Licencia</h3>

{!! Form::open(['action' => 'HumanResources\LicensingController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.licensings.form')	

{!! Form::close() !!}

@endsection