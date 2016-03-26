@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Préstamo Personal</h3>

{!! Form::open(['action' => 'HumanResources\LoanController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('loan_id', $loan->id) !!}

  @include('humanresources.loans.form')

{!! Form::close() !!}

@endsection