@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Aguinaldo</h5>

{!! Form::open(['action' => 'HumanResources\BonuController@store']) !!}

	<div class="row">
  		<div class="col m3">
  			  <div class="input-field">
            	{!! Form::select('client_id', $clients, '', ['class' => 'browser-default']) !!}
        	</div>
        
          <div class="input-field">
            {!! Form::number('ammount', '', ['class' => 'validate']) !!}
            {!! Form::label('ammount', 'Monto') !!}
          </div>
          
  		</div>

      <div class="col m4">

          <div class="input-field">
            {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
          </div>

          <div class="input-field">
            {!! Form::select('type_id', [], '', ['class' => 'browser-default']) !!}
          </div>

      </div>
  		
  		<div class="col m4">

          <div class="input-field">
            {!! Form::text('date', '', ['class' => 'validate']) !!}
            {!! Form::label('date', 'Fecha') !!}
          </div>

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