@extends('default')

@section('content')

<div class="row">
	<div class="col s12 m12">	    	
    	<div class="card-panel amber darken-2 white-text">
      		<span class="card-title">Registrar Gerencia</span> 	      		      		
    	</div>
    </div>
</div>

{!! Form::open(['action' => 'Entity\ManagementController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  <div class="row">

    <div class="col m4">
  		
      <div class="input-field">
          {!! Form::text('name', '', ['class' => 'validate']) !!}
          {!! Form::label('name', 'Nombre') !!}
          <span class="red-text">{{ $errors->first('name') }}</span>
      </div>      
  		
  	</div>

  	<div class="col m4">
  		
      {!! Form::label('responsible_id', 'Responsable') !!}
      {!! Form::select('responsible_id', $employees, '', ['class' => 'browser-default']) !!}
      <span class="red-text">{{ $errors->first('responsible_id') }}</span>

  	</div>

  </div>

  	 
</div>


<div class="row">
	<div class="col s12 m12">	    	
    	<div class="card-panel blue-grey lighten-5">
      		<button class="btn btn-large waves-effect waves-light amber darken-2" type="submit" name="action">
      			Guardar
			</button>
    	</div>
    </div>
</div>

{!! Form::close() !!}

@endsection