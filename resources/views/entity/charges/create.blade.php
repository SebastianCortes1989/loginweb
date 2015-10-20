@extends('default')

@section('content')

<div class="row">
	<div class="col s12 m12">	    	
    	<div class="card-panel amber darken-2 white-text">
      		<span class="card-title">Registrar Unidad</span> 	      		      		
    	</div>
    </div>
</div>

 <div class="row">
    <div class="col m3">
  		
      <div class="input-field">
          {!! Form::text('name', '', ['class' => 'validate']) !!}
          {!! Form::label('name', 'Nombre') !!}
      </div>      
  		
  	</div>

  	<div class="col m3">
  		
  		<div class="input-field">
          {!! Form::select('branch_id', [], '', ['class' => 'browser-default']) !!}
          {!! Form::label('branch_id', 'Sucursal') !!}
      </div> 

  	</div>

    <div class="col m3">
      
      <div class="input-field">
          {!! Form::select('gerency_id', [], '', ['class' => 'browser-default']) !!}
          {!! Form::label('gerency_id', 'Gerencia') !!}
      </div> 

    </div>

    <div class="col m3">
      
      <div class="input-field">
          {!! Form::select('unit_id', [], '', ['class' => 'browser-default']) !!}
          {!! Form::label('unit_id', 'Unidad') !!}
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

@endsection