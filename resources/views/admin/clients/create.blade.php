@extends('default')

@section('content')

<div class="row">
	<div class="col s12 m12">	    	
    	<div class="card-panel amber darken-2 white-text">
      		<span class="card-title">Registrar Cliente</span> 	      		      		
    	</div>
    </div>
</div>

 <div class="row">
  	<div class="col m4">
  		
  		<div class="input-field">
          	{!! Form::text('rut', '', ['class' => 'validate']) !!}
          	{!! Form::label('rut', 'R.U.T.') !!}
        </div>

        <div class="input-field">
          	{!! Form::text('name', '', ['class' => 'validate']) !!}
          	{!! Form::label('name', 'Nombre Corto') !!}
        </div>

        <div class="input-field">        	
          	{!! Form::textarea('social_reason', '', ['class' => 'materialize-textarea']) !!}
          	{!! Form::label('social_reason', 'Razón Social') !!}
        </div>

        <div class="input-field">
          	{!! Form::textarea('gyre', '', ['class' => 'materialize-textarea']) !!}
	        {!! Form::label('gyre', 'Giro') !!}
        </div>

  	</div>

  	<div class="col m4">
  		
  		<div class="input-field">
        	{!! Form::text('address', '', ['class' => 'validate']) !!}
        	{!! Form::label('address', 'Dirección') !!}
        </div>

        <div class="input-field">
        	{!! Form::select('region_id', $regions, '', ['class' => 'browser-default']) !!}
        </div>

        <div class="input-field">
        	{!! Form::select('city_id', $cities, '', ['class' => 'browser-default']) !!}
        </div>

        <div class="input-field">
        	{!! Form::select('commune_id', $communes, '', ['class' => 'browser-default']) !!}
        </div>

        <div class="input-field">
        	{!! Form::text('phone', '', ['class'=>'validate']) !!}
        	{!! Form::label('phone', 'Teléfono') !!}
        </div>

        <div class="input-field">
        	{!! Form::password('password', '', ['class'=>'validate']) !!}
        	{!! Form::label('password', 'Clave') !!}
        </div>

        <div class="input-field">
        	{!! Form::email('email', '', ['class'=>'validate']) !!}
        	{!! Form::label('email', 'E-mail') !!}
        </div>        

  	</div>

  	<div class="col m4">
  		
  		<div class="input-field">
        	{!! Form::text('name_representative', '', ['class'=>'validate']) !!}
        	{!! Form::label('name_representative', 'Nombre Representante') !!}
        </div>

        <div class="input-field">
        	{!! Form::text('rut_representative', '', ['class'=>'validate']) !!}
        	{!! Form::label('rut_representative', 'R.U.T. Representante') !!}
        </div>

        @foreach($insurances as $id => $name)

          {!! Form::radio('insurance_id', $id) !!}
          {!! Form::label('insurance_id', $name) !!}

        @endforeach        

        <br>

        <div class="input-field">
        	{!! Form::select('complementary', $complementaries, '', ['class' => 'browser-default']) !!}
        </div>

        <div class="input-field">
        	{!! Form::select('compensacion', $compensacions, '', ['class' => 'browser-default']) !!}
        </div>

        <div class="input-field">
        	{!! Form::text('mideplan', '', ['class'=>'validate']) !!}
        	{!! Form::label('mideplan', 'N° Registro Mideplan') !!}
        </div>

        <div class="file-field input-field">
	    	<div class="btn">
	        	<span>Logo</span>
	        	{!! Form::file('logo') !!}
	      	</div>
	      	<div class="file-path-wrapper">
	        	<input class="file-path validate" type="text">
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