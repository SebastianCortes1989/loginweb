@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Permiso</h5>

{!! Form::open(['action' => 'HumanResources\PermissionController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('permission_id', $permission->id) !!}

  @include('humanresources.permissions.form')	

{!! Form::close() !!}

@endsection