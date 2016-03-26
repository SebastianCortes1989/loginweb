@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Descuento</h3>

{!! Form::open(['action' => 'HumanResources\DiscountController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.discounts.form')

{!! Form::close() !!}

@endsection