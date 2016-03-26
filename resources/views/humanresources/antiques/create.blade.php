@extends('default')

@section('content')


@include('humanresources.menu')
  
<h3 class="text-center">Registrar Certificado</h3>

{!! Form::open(['action' => 'HumanResources\AntiqueController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.antiques.form')	

{!! Form::close() !!}

@endsection