@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Permiso</h3>

{!! Form::open(['action' => 'HumanResources\PermissionController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.permissions.form')	

{!! Form::close() !!}

@endsection