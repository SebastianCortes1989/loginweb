@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Traslado</h5>

{!! Form::open(['action' => 'HumanResources\TransferController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	<div class="row">
  		<div class="col m3">

        {!! Form::label('employee_id', 'Trabajador') !!}
        {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('employee_id') }}</span>
          
  		</div>

      <div class="col m3">

        <div class="input-field">
          {!! Form::text('start_date', '', ['class' => 'validate date']) !!}
          {!! Form::label('start_date', 'Fecha de Inicio') !!}
        <span class="red-text">{{ $errors->first('start_date') }}</span>
        </div>

        <div class="input-field">
          {!! Form::text('end_date', '', ['class' => 'validate date']) !!}
          {!! Form::label('end_date', 'Fecha de Término') !!}
        <span class="red-text">{{ $errors->first('end_date') }}</span>
        </div>          

      </div>
  		
  		<div class="col m3">

        {!! Form::label('cause_id', 'Causa') !!}
        {!! Form::select('cause_id', [], '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('cause_id') }}</span>
          
  		</div>

      <div class="col m3">          

        {!! Form::label('from_branch_id', 'Sucursal de Origen') !!}
        {!! Form::select('from_branch_id', [], '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('from_branch_id') }}</span>

        {!! Form::label('to_branch_id', 'Sucursal Transferida') !!}
        {!! Form::select('to_branch_id', [], '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('to_branch_id') }}</span>
          
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