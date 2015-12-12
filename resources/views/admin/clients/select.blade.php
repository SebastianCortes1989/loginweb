@extends('default')

@section('content')

<div class="row">
	<div class="col s12 m12">	    	
    	<div class="card-panel amber darken-2 white-text">
      		<span class="card-title">Registrar Cliente</span> 	      		      		
    	</div>
    </div>
</div>


{!! Form::open(['action' => 'Admin\ClientController@postSelect']) !!}

  <div class="row">
  	<div class="col m4">  		
  		  
        {!! Form::label('client_id', 'Seleccionar Cliente') !!}
        {!! Form::select('client_id', $clients, '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('client_id') }}</span>       

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


@section('scripts')

{!! Html::script('plugins/jquery-rut/jquery.Rut.min.js') !!}

@endsection
