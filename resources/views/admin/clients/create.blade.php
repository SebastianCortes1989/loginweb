@extends('default')

@section('content')

<h3 class="text-center">Registrar Cliente</h3>


{!! Form::open(['files' => true, 'action' => 'Admin\ClientController@store']) !!}

  @include('admin.clients.form')
  
{!! Form::close() !!}


@endsection


@section('scripts')

{!! Html::script('plugins/jquery-rut/jquery.Rut.min.js') !!}

@endsection
