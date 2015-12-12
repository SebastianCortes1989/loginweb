@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Finiquito</h5>

{!! Form::open(['action' => 'HumanResources\SettlementController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	<div class="row">
  		<div class="col m3">

        {!! Form::label('employee_id', 'Trabajador') !!}
        {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('employee_id') }}</span>

        {!! Form::label('causal_id', 'Causal') !!}
        {!! Form::select('causal_id', $employees, '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('causal_id') }}</span>

        <div class="input-field">
          {!! Form::text('date', '', ['class' => 'validate date']) !!}
          {!! Form::label('date', 'Fecha de Emisión') !!}
          <span class="red-text">{{ $errors->first('date') }}</span>
        </div>    
          
  		</div>

      <div class="col m4">    

          <div class="input-field">
            {!! Form::number('proportional_holidays', '', ['class' => 'validate']) !!}
            {!! Form::label('proportional_holidays', 'Vacaciones Proporcionales') !!}
          </div>

          <div class="input-field">
            {!! Form::number('substitute_compensation', '', ['class' => 'validate']) !!}
            {!! Form::label('substitute_compensation', 'Indem. Sustitutiva') !!}
          </div>

          <div class="input-field">
            {!! Form::number('service_years', '', ['class' => 'validate']) !!}
            {!! Form::label('service_years', 'Indem. Años de Servicio') !!}
          </div>

          <div class="input-field">
            {!! Form::number('substitute_agreed', '', ['class' => 'validate']) !!}
            {!! Form::label('substitute_agreed', 'Indem. Pactada') !!}
          </div>

          <div class="input-field">
            {!! Form::number('substitute_voluntary', '', ['class' => 'validate']) !!}
            {!! Form::label('substitute_voluntary', 'Indem. Voluntaria') !!}
          </div>

          <div class="input-field">
            {!! Form::number('proportional_holidays', '', ['class' => 'validate']) !!}
            {!! Form::label('proportional_holidays', 'Fecha de Término') !!}
          </div>

      </div>
  		
  		<div class="col m4">

          <div class="input-field">
            {!! Form::number('afc', '', ['class' => 'validate']) !!}
            {!! Form::label('afc', 'Aporte Empleador AFC') !!}
          </div>

          <div class="input-field">
            {!! Form::number('compensacion_loans', '', ['class' => 'validate']) !!}
            {!! Form::label('compensacion_loans', 'Prestamos CCAF') !!}
          </div>

          <div class="input-field">
            {!! Form::number('petty_cash', '', ['class' => 'validate']) !!}
            {!! Form::label('petty_cash', 'Dif. de Rend. Caja Chica') !!}
          </div>

          <div class="input-field">
            {!! Form::number('discounts_others', '', ['class' => 'validate']) !!}
            {!! Form::label('discounts_others', 'Otros Descuentos') !!}
          </div>

          <div class="input-field">
            {!! Form::number('severals', '', ['class' => 'validate']) !!}
            {!! Form::label('severals', 'Especificar') !!}
          </div>
          
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