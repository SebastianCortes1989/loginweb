@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Préstamo CCAF</h5>

{!! Form::open(['action' => 'HumanResources\CcafController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	<div class="row">
  		<div class="col m3">

        {!! Form::label('type_id', 'Tipo') !!}
        {!! Form::select('type_id', [], '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('type_id') }}</span>
          
  		</div>

      <div class="col m3">

        {!! Form::label('employee_id', 'Trabajador') !!}
        {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('employee_id') }}</span>

        {!! Form::label('compensacion_id', 'Caja de Compensación') !!}
        {!! Form::select('compensacion_id', [], '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('compensacion_id') }}</span>

      </div>

      <div class="col m3">

        <div class="input-field">
          {!! Form::number('quotas', '', ['class' => 'validate']) !!}
          {!! Form::label('quotas', 'Cuotas') !!}
          <span class="red-text">{{ $errors->first('quotas') }}</span>
        </div>

        <div class="input-field">
          {!! Form::number('ammount', '', ['class' => 'validate']) !!}
          {!! Form::label('ammount', 'Monto') !!}
          <span class="red-text">{{ $errors->first('ammount') }}</span>
        </div>

      </div>
  		
  		<div class="col m3">

        {!! Form::label('month', 'Mes') !!}
        {!! Form::select('month', [], '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('month') }}</span>

        {!! Form::label('year', 'Año') !!}
        {!! Form::select('year', [], '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('year') }}</span>
          
  		</div>

  	</div>

  	<div class="row">
		<div class="col s12 m12">	    	
	    	<div class="card-panel blue-grey lighten-5">
	      		<button class="btn btn-large waves-effect waves-light purple darken-1" type="submit" name="action">
	      			Guardar
				</button>
	    	</div>
	    </div>
	</div>

{!! Form::close() !!}

@endsection