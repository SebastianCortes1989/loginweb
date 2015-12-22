@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Permiso</h5>

{!! Form::open(['action' => 'HumanResources\PermissionController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	<div class="row">
  		<div class="col m4">

        {!! Form::label('employee_id', 'Trabajador') !!}
        {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('employee_id') }}</span>
        
  		</div>

      <div class="col m4">

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
  		
  		<div class="col m4">

          {!! Form::label('type_id', 'Tipo') !!}
          {!! Form::select('type_id', $permissionsTypes, '', ['class' => 'browser-default']) !!}
          <span class="red-text">{{ $errors->first('type_id') }}</span>

          <div class="input-field">
            {!! Form::textarea('description', '', ['class' => 'validate', 'rows' => 30]) !!}
            {!! Form::label('description', 'Descripción') !!}
            <span class="red-text">{{ $errors->first('description') }}</span>
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