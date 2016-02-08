@extends('default')

@section('content')


@include('humanresources.menu')
  
<h5 class="purple-text center-align">Registrar Certificado</h5>

{!! Form::open(['action' => 'HumanResources\AntiqueController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.antiques.form')	

{!! Form::close() !!}

@endsection