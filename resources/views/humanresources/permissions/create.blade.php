@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Permiso</h5>

{!! Form::open(['action' => 'HumanResources\PermissionController@store']) !!}

	<div class="row">
  		<div class="col m3">
  			  <div class="input-field">
            	{!! Form::select('client_id', $clients, '', ['class' => 'browser-default']) !!}
        	</div>

          <div class="input-field">
            {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
          </div>  
          
  		</div>

      <div class="col m3">

          <div class="input-field">
            {!! Form::text('start_date', '', ['class' => 'validate']) !!}
            {!! Form::label('start_date', 'Fecha de Inicio') !!}
          </div>

          <div class="input-field">
            {!! Form::text('end_date', '', ['class' => 'validate']) !!}
            {!! Form::label('end_date', 'Fecha de Término') !!}
          </div>

          

      </div>
  		
  		<div class="col m3">

          <div class="input-field">
            {!! Form::select('type_id', [], '', ['class' => 'browser-default']) !!}
          </div>

          <div class="input-field">
            {!! Form::number('year', '', ['class' => 'validate']) !!}
            {!! Form::label('year', 'Año de Vacaciones') !!}
          </div>
          
  		</div>

      <div class="col m3">          

          <div class="input-field">
              {!! Form::textarea('description', '', ['class' => 'validate', 'rows' => 50]) !!}
              {!! Form::label('description', 'Descripción') !!}
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