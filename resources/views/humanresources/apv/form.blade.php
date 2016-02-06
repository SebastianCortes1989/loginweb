<div class="row">  		
      <div class="col m3">

        {!! Form::label('employee_id', 'Trabajador') !!}
        {!! Form::select('employee_id', $employees, isset($saving) ? $saving->employee_id : '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('employee_id') }}</span>

      </div>

      <div class="col m3">

        {!! Form::label('type_id', 'Tipo') !!}
        {!! Form::select('type_id', $savingTypes, isset($saving) ? $saving->type_id : '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('type_id') }}</span>

      </div>
  		
  		<div class="col m3">

        <div class="input-field">
          {!! Form::number('ammount', isset($saving) ? $saving->ammount : '', ['class' => 'validate']) !!}
          {!! Form::label('ammount', 'Monto') !!}
          <span class="red-text">{{ $errors->first('ammount') }}</span>
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
