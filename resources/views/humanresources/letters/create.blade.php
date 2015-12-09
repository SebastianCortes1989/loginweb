@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Carta de Aviso</h5>

{!! Form::open(['action' => 'HumanResources\LetterController@store']) !!}

  {!! Form::hidden('client_id') !!}

	<div class="row">
  		<div class="col m3">

        {!! Form::label('employee_id', 'Trabajador') !!}
        {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('employee_id') }}</span>
          
  		</div>

      <div class="col m4">    

          <div class="input-field">
            {!! Form::text('notice_date', '', ['class' => 'validate date']) !!}
            {!! Form::label('notice_date', 'Fecha de Aviso') !!}
            <span class="red-text">{{ $errors->first('notice_date') }}</span>
          </div> 

          <div class="input-field">
            {!! Form::text('settlement_date', '', ['class' => 'validate date']) !!}
            {!! Form::label('settlement_date', 'Fecha de Finiquitación') !!}
            <span class="red-text">{{ $errors->first('settlement_date') }}</span>
          </div> 
          
      </div>
  		
  		<div class="col m4">

          {!! Form::label('causal_id', 'Causal') !!}
          {!! Form::select('causal_id', $employees, '', ['class' => 'browser-default']) !!}
          <span class="red-text">{{ $errors->first('causal_id') }}</span>

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