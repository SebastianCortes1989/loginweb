<div class="row">
  		<div class="col m4">

        {!! Form::label('employee_id', 'Trabajador') !!}
        {!! Form::select('employee_id', $employees, isset($licensing) ? $licensing->employee_id : '', ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('employee_id') }}</span>

  		</div>

      <div class="col m4">

          <div class="input-field">
            {!! Form::text('start_date', isset($licensing) ? $licensing->start_date->format('d/m/Y') : '', ['class' => 'validate date']) !!}
            {!! Form::label('start_date', 'Fecha de Inicio') !!}
            <span class="red-text">{{ $errors->first('start_date') }}</span>
          </div>

          <div class="input-field">
            {!! Form::text('end_date', isset($licensing) ? $licensing->end_date->format('d/m/Y') : '', ['class' => 'validate date']) !!}
            {!! Form::label('end_date', 'Fecha de Término') !!}
            <span class="red-text">{{ $errors->first('end_date') }}</span>
          </div>                          

      </div>
        
  		<div class="col m4">

          <div class="input-field">
            {!! Form::number('number', isset($licensing) ? $licensing->number : '', ['class' => 'validate']) !!}
            {!! Form::label('number', 'Número') !!}
            <span class="red-text">{{ $errors->first('number') }}</span>
          </div>


          {!! Form::checkbox('work_accident[]', (isset($licensing) and $licensing->work_accident ==1) ? true : false) !!}
          {!! Form::label('work_accident', 'Accidente de Trabajo') !!}
          
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
