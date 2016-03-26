@extends('default')

@section('content')


@include('humanresources.menu')
  
<h3 class="text-center">Editar Certificado</h3>

{!! Form::open(['action' => 'HumanResources\AntiqueController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('antique_id', $antique->id) !!}

  @include('humanresources.antiques.form')	

{!! Form::close() !!}

@endsection