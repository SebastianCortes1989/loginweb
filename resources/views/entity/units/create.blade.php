@extends('default')

@section('content')

<div class="row">
	<div class="col s12 m12">	    	
    	<div class="card-panel amber darken-2 white-text">
      		<span class="card-title">Registrar Unidad</span> 	      		      		
    	</div>
    </div>
</div>

{!! Form::open(['action' => 'Entity\UnitController@store']) !!}

 <div class="row">
    <div class="col m3">
        <div class="input-field">
            {!! Form::select('client_id', $clients, '', ['class' => 'browser-default']) !!}
        </div>
    </div>

    <div class="col m3">  		
      <div class="input-field">
          {!! Form::text('name', '', ['class' => 'validate']) !!}
          {!! Form::label('name', 'Nombre') !!}
      </div>        		
  	</div>

  	<div class="col m3">  		
  		<div class="input-field">
          {!! Form::select('employee_id', $employees, '', ['class' => 'browser-default']) !!}
      </div> 
  	</div>

    <div class="col m3">      
      <div class="input-field">
          {!! Form::select('management_id', $managements, '', ['class' => 'browser-default']) !!}
      </div> 
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