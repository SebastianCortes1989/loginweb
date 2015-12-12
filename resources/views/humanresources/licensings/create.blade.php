@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Licencia</h5>

{!! Form::open(['action' => 'HumanResources\LicensingController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	<div class="row">
  		<div class="col m4">

        {!! Form::label('employee_id', 'Trabajador') !!}
        {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('employee_id') }}</span>

  		</div>

      <div class="col m4">

          <div class="input-field">
            {!! Form::text('start_date', '', ['class' => 'validate']) !!}
            {!! Form::label('start_date', 'Fecha de Inicio') !!}
            <span class="red-text">{{ $errors->first('start_date') }}</span>
          </div>

          <div class="input-field">
            {!! Form::text('end_date', '', ['class' => 'validate']) !!}
            {!! Form::label('end_date', 'Fecha de Término') !!}
            <span class="red-text">{{ $errors->first('end_date') }}</span>
          </div>                          

      </div>
        
  		<div class="col m4">

          <div class="input-field">
            {!! Form::number('ammount', '', ['class' => 'validate']) !!}
            {!! Form::label('ammount', 'Monto') !!}
            <span class="red-text">{{ $errors->first('ammount') }}</span>
          </div>


          {!! Form::checkbox('work_accident[]', 1) !!}
          {!! Form::label('work_accident', 'Accidente de Trabajo') !!}
          
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