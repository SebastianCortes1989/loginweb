@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Descuento</h5>

{!! Form::open(['action' => 'HumanResources\DiscountController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.discounts.form')

{!! Form::close() !!}

@endsection