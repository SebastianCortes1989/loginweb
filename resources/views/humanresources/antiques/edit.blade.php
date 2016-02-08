@extends('default')

@section('content')


@include('humanresources.menu')
  
<h5 class="purple-text center-align">Editar Certificado</h5>

{!! Form::open(['action' => 'HumanResources\AntiqueController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('antique_id', $antique->id) !!}

  @include('humanresources.antiques.form')	

{!! Form::close() !!}

@endsection