@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Préstamo Personal</h5>

{!! Form::open(['action' => 'HumanResources\LoanController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('loan_id', $loan->id) !!}

  @include('humanresources.loans.form')

{!! Form::close() !!}

@endsection