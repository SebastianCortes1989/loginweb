@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Permiso</h3>

{!! Form::open(['action' => 'HumanResources\PermissionController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('permission_id', $permission->id) !!}

  @include('humanresources.permissions.form')	

{!! Form::close() !!}

@endsection