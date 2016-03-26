@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Descuento</h3>

{!! Form::open(['action' => 'HumanResources\DiscountController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('discount_id', $discount->id) !!}

  @include('humanresources.discounts.form')

{!! Form::close() !!}

@endsection