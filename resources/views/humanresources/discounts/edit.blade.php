@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Descuento</h5>

{!! Form::open(['action' => 'HumanResources\DiscountController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('discount_id', $discount->id) !!}

  @include('humanresources.discounts.form')

{!! Form::close() !!}

@endsection