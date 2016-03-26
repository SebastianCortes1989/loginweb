<div class="row">
	<div class="col-md-4">

    {!! Form::label('employee_id', 'Trabajador') !!}
    {!! Form::select('employee_id', $employees, isset($licensing) ? $licensing->employee_id : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('employee_id') }}</span>

	</div>

  <div class="col-md-4">
      
    {!! Form::label('start_date', 'Fecha de Inicio') !!}
    {!! Form::text('start_date', isset($licensing) ? $licensing->start_date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
    <span class="help-block">{{ $errors->first('start_date') }}</span>
  
    {!! Form::label('end_date', 'Fecha de Término') !!}
    {!! Form::text('end_date', isset($licensing) ? $licensing->end_date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
    <span class="help-block">{{ $errors->first('end_date') }}</span>

  </div>
    
	<div class="col-md-4">
  
    {!! Form::label('number', 'Número') !!}
    {!! Form::number('number', isset($licensing) ? $licensing->number : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('number') }}</span>

    {!! Form::label('work_accident', 'Accidente de Trabajo') !!}
    {!! Form::checkbox('work_accident[]', (isset($licensing) and $licensing->work_accident ==1) ? true : false) !!}
      
	</div>

</div>

<div class="row">
	  <div class="col-md-12">	    	
    	
      	<button class="btn btn-primary " type="submit" name="action">
      			Guardar
			  </button>
    	</div>
    </div>
</div>
