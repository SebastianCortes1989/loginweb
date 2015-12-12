@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Contrato</h5>

{!! Form::open(['action' => 'HumanResources\ContractController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	<div class="row">
  		<div class="col m3">
          {!! Form::label('responsible_id', 'Responsable') !!}
          {!! Form::select('responsible_id', $employees, '', ['class' => 'browser-default']) !!}
          <span class="red-text">{{ $errors->first('responsible_id') }}</span>
  		</div>

  		<div class="col m3">
          {!! Form::label('branch_id', 'Sucursal') !!}
          {!! Form::select('branch_id', $branchs, '', ['class' => 'browser-default']) !!}
          <span class="red-text">{{ $errors->first('branch_id') }}</span>

          
          {!! Form::label('working_type', 'Tipo de Jornada') !!}
        	{!! Form::select('working_type', $workingTypes, '', ['class' => 'browser-default']) !!}
          <span class="red-text">{{ $errors->first('working_type') }}</span>
  		</div>

  		<div class="col m3">
          {!! Form::label('contract_type', 'Tipo de Contrato') !!}
        	{!! Form::select('contract_type', $contractTypes, '', ['class' => 'browser-default']) !!}
          <span class="red-text">{{ $errors->first('contract_type') }}</span>

        	<div class="input-field">
          		{!! Form::text('start_date', '', ['class' => 'validate date']) !!}
          		{!! Form::label('start_date', 'Fecha de Inicio') !!}
              <span class="red-text">{{ $errors->first('start_date') }}</span>
      		</div> 
  		</div>

  		<div class="col m3">
          {!! Form::label('charge_id', 'Cargo') !!}
        	{!! Form::select('charge_id', $charges, '', ['class' => 'browser-default']) !!}
          <span class="red-text">{{ $errors->first('charge_id') }}</span>

        	<div class="input-field">
          		{!! Form::text('end_date', '', ['class' => 'validate date']) !!}
          		{!! Form::label('end_date', 'Fecha de Término') !!}
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