<div class="row">
		<div class="col m3">
        
        {!! Form::label('employee_id', 'Trabajador') !!}
        {!! Form::select('employee_id', $employees, isset($extraHour) ? $extraHour->employee_id : '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('employee_id') }}</span>  
        
		</div>

    <div class="col m4">
        <div class="input-field">
          {!! Form::text('start_date', isset($extraHour) ? $extraHour->start_date->format('d/m/Y') : '', ['class' => 'validate datetime']) !!}
          {!! Form::label('start_date', 'Fecha de Inicio') !!}
          <span class="red-text">{{ $errors->first('start_date') }}</span>
        </div>  
        
        <div class="input-field">
          {!! Form::text('end_date', isset($extraHour) ? $extraHour->end_date->format('d/m/Y') : '', ['class' => 'validate datetime']) !!}
          {!! Form::label('end_date', 'Fecha de Término') !!}
          <span class="red-text">{{ $errors->first('end_date') }}</span>
        </div>

    </div>
		
		<div class="col m4">

        {!! Form::label('percentaje', 'Porcentaje') !!}
        {!! Form::select('percentaje', $percentajes, isset($extraHour) ? $extraHour->percentaje : '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('percentaje_id') }}</span>

      	<div class="input-field">
        		{!! Form::textarea('description', isset($extraHour) ? $extraHour->description : '', ['class' => 'validate', 'rows' => 50]) !!}
        		{!! Form::label('description', 'Descripción') !!}
            <span class="red-text">{{ $errors->first('descripcion') }}</span>
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
