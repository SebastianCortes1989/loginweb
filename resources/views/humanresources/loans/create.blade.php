@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Préstamo Personal</h3>

{!! Form::open(['action' => 'HumanResources\LoanController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.loans.form')

{!! Form::close() !!}

@endsection