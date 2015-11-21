@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Certificado</h5>

{!! Form::open(['action' => 'HumanResources\AntiqueController@store']) !!}

	<div class="row">
  		<div class="col m4">

  			  <div class="input-field">
            	{!! Form::select('client_id', $clients, '', ['class' => 'browser-default']) !!}
        	</div>
          
  		</div>

      <div class="col m4">

          <div class="input-field">
            {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
          </div>
        
      </div>
  	
  		<div class="col m4">

          <div class="input-field">
            {!! Form::text('date', '', ['class' => 'validate']) !!}
            {!! Form::label('date', 'Fecha') !!}
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