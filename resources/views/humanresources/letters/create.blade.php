@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Carta de Aviso</h5>

{!! Form::open(['action' => 'HumanResources\LetterController@store']) !!}

	<div class="row">
  		<div class="col m3">
  			  <div class="input-field">
            	{!! Form::select('client_id', $clients, '', ['class' => 'browser-default']) !!}
        	</div>

          <div class="input-field">
            {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
          </div>          
          
  		</div>

      <div class="col m4">    

          <div class="input-field">
            {!! Form::text('notice_date', '', ['class' => 'validate']) !!}
            {!! Form::label('notice_date', 'Fecha de Aviso') !!}
          </div> 

          <div class="input-field">
            {!! Form::text('settlement_date', '', ['class' => 'validate']) !!}
            {!! Form::label('settlement_date', 'Fecha de Finiquitación') !!}
          </div> 
          
      </div>
  		
  		<div class="col m4">

          <div class="input-field">
            {!! Form::select('causal_id', $employees, '', ['class' => 'browser-default']) !!}
          </div>

          <div class="input-field">
            {!! Form::textarea('fact', '', ['class' => 'validate']) !!}
            {!! Form::label('fact', 'Hecho que respalda Causal') !!}
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