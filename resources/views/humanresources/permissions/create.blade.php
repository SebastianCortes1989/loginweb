@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Permiso</h5>

{!! Form::open(['action' => 'HumanResources\PermissionController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.permissions.form')	

{!! Form::close() !!}

@endsection