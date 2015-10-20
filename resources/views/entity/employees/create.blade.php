@extends('default')

@section('content')

<div class="row">
	<div class="col s12 m12">	    	
    	<div class="card-panel amber darken-2 white-text">
      		<span class="card-title">Registrar Trabajador</span> 	      		      		
    	</div>
    </div>
</div>

 <div class="row">
  	<div class="col m3">
  		
  		<div class="input-field">
          	{!! Form::text('rut', '', ['class' => 'validate']) !!}
          	{!! Form::label('rut', 'R.U.T.') !!}
        </div>

        <div class="input-field">
          	{!! Form::text('name', '', ['class' => 'validate']) !!}
          	{!! Form::label('name', 'Nombre') !!}
        </div>

        <div class="input-field">        	
          	{!! Form::text('birthday', '', ['class' => 'validate']) !!}
          	{!! Form::label('birthday', 'Fecha de Nacimiento') !!}
        </div>

        <div class="input-field">
          	{!! Form::text('address', '', ['class' => 'validate']) !!}
	        {!! Form::label('address', 'Dirección') !!}
        </div>

  	</div>

  	<div class="col m3">
  		
  		  <div class="input-field">
        	{!! Form::text('phone', '', ['class' => 'validate']) !!}
        	{!! Form::label('phone', 'Teléfono') !!}
        </div>

        <div class="input-field">
          {!! Form::text('movil_phone', '', ['class' => 'validate']) !!}
          {!! Form::label('movil_phone', 'Teléfono Celular') !!}
        </div>

        <div class="input-field">
        	{!! Form::select('nationality_id', [], '', ['class' => 'browser-default']) !!}
        	{!! Form::label('nationality_id', 'Nacionalidad') !!}
        </div>

        <div class="input-field">
        	{!! Form::select('city_id', [], '', ['class' => 'browser-default']) !!}
        	{!! Form::label('city_id', 'Ciudad') !!}
        </div>

        <div class="input-field">
        	{!! Form::select('commune_id', [], '', ['class' => 'browser-default']) !!}
        	{!! Form::label('commune_id', 'Comuna') !!}
        </div>

        <div class="input-field">
        	{!! Form::text('passport', '', ['class'=>'validate']) !!}
        	{!! Form::label('passport', 'Pasaporte') !!}
        </div>      

  	</div>

  	<div class="col m3">
  		
  		<div class="input-field">
        {!! Form::select('type_id', [], '', ['class' => 'browser-default']) !!}
        {!! Form::label('type_id', 'Tipo de Trabajador') !!}
      </div>

      <div class="input-field">
        {!! Form::select('afc_id', [], '', ['class' => 'browser-default']) !!}
        {!! Form::label('afc_id', 'AFC') !!}
      </div>

      <div class="input-field">
        {!! Form::select('afp_id', [], '', ['class' => 'browser-default']) !!}
        {!! Form::label('afp_id', 'AFP') !!}
      </div>

      <div class="input-field">
        {!! Form::select('apv_id', [], '', ['class' => 'browser-default']) !!}
        {!! Form::label('apv_id', 'APV') !!}
      </div>

      <div class="input-field">
        {!! Form::select('bank_id', [], '', ['class' => 'browser-default']) !!}
        {!! Form::label('bank_id', 'Bancos') !!}
      </div>

      <div class="input-field">
        {!! Form::select('account_type_id', [], '', ['class' => 'browser-default']) !!}
        {!! Form::label('account_type_id', 'Tipo de Cuenta') !!}
      </div>      

      <div class="input-field">
        {!! Form::text('account_number', '', ['class' => 'validate']) !!}
        {!! Form::label('account_number', 'N° de Cuenta') !!}
      </div>   	

  	</div> 

    <div class="col m3">

      <div class="input-field">
        {!! Form::select('health_id', [], '', ['class' => 'browser-default']) !!}
        {!! Form::label('health_id', 'Salud') !!}
      </div>

      <div class="input-field">
        {!! Form::text('ges', '', ['class' => 'validate']) !!}
        {!! Form::label('ges', 'GES') !!}
      </div> 

      <div class="input-field">
        {!! Form::text('plan_value', '', ['class' => 'validate']) !!}
        {!! Form::label('plan_value', 'Valor de Plan') !!}
      </div> 

      <div class="input-field">
        {!! Form::select('familiar_charge', [], '', ['class' => 'browser-default']) !!}
        {!! Form::label('famliar_charge', 'Cargas Familiares') !!}
      </div> 

      <div class="input-field">
        {!! Form::text('familiars', '', ['class' => 'validate']) !!}
        {!! Form::label('famliar_charge', 'Familiares') !!}
      </div> 

      <div class="input-field">
        {!! Form::text('maternals', '', ['class' => 'validate']) !!}
        {!! Form::label('famliar_charge', 'Maternales') !!}
      </div> 

      <div class="input-field">
        {!! Form::text('invalidates', '', ['class' => 'validate']) !!}
        {!! Form::label('invalidates', 'Invalidas') !!}
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