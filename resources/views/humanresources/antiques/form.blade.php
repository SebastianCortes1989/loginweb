<div class="row">
    <div class="col m4">

      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, isset($antique) ? $antique->employee_id : '', ['class' => 'browser-default']) !!}
      <span class="red-text">{{ $errors->first('employee_id') }}</span>

    </div>
	
		<div class="col m4">

        <div class="input-field">
          {!! Form::text('date', isset($antique) ? $antique->date->format('d/m/Y') : '', ['class' => 'validate date']) !!}
          {!! Form::label('date', 'Fecha') !!}
          <span class="red-text">{{ $errors->first('date') }}</span>
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
