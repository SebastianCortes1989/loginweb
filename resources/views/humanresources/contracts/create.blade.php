@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Contrato</h3>

{!! Form::open(['action' => 'HumanResources\ContractController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	<div class="row">
  		<div class="col-md-3">
          {!! Form::label('employee_id', 'Trabajador') !!}
          {!! Form::select('employee_id', $employees, '', ['class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('employee_id') }}</span>
  		</div>

  		<div class="col-md-3">
          {!! Form::label('branch_id', 'Sucursal') !!}
          {!! Form::select('branch_id', $branchs, '', ['class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('branch_id') }}</span>

          
          {!! Form::label('working_type', 'Tipo de Jornada') !!}
        	{!! Form::select('working_type', $workingTypes, '', ['class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('working_type') }}</span>
  		</div>

  		<div class="col-md-3">
          {!! Form::label('contract_type', 'Tipo de Contrato') !!}
        	{!! Form::select('contract_type', $contractTypes, '', ['class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('contract_type') }}</span>

        	
          		{!! Form::text('start_date', '', ['class' => 'form-control date']) !!}
          		{!! Form::label('start_date', 'Fecha de Inicio') !!}
              <span class="help-block">{{ $errors->first('start_date') }}</span>
      		</div> 
  		</div>

  		<div class="col-md-3">
          {!! Form::label('charge_id', 'Cargo') !!}
        	{!! Form::select('charge_id', $charges, '', ['class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('charge_id') }}</span>

        	
          		{!! Form::text('end_date', '', ['class' => 'form-control date']) !!}
          		{!! Form::label('end_date', 'Fecha de Término') !!}
      		</div> 
  		</div>

  	</div>

  	<div class="row">
		<div class="col-md-12">	    	
	    	
	      		<button class="btn btn-primary " type="submit" name="action">
	      			Guardar
				</button>
	    	</div>
	    </div>
	</div>

{!! Form::close() !!}

@endsection