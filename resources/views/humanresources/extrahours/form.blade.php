<div class="row">
	<div class="col-md-4">
      
    {!! Form::label('employee_id', 'Trabajador') !!}
    {!! Form::select('employee_id', $employees, isset($extraHour) ? $extraHour->employee_id : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('employee_id') }}</span>  
      
    {!! Form::label('start_date', 'Fecha de Inicio') !!}
    {!! Form::text('start_date', isset($extraHour) ? $extraHour->start_date->format('d/m/Y') : '', ['class' => 'form-control datetime']) !!}
    <span class="help-block">{{ $errors->first('start_date') }}</span>
    
    {!! Form::label('end_date', 'Fecha de Término') !!}
    {!! Form::text('end_date', isset($extraHour) ? $extraHour->end_date->format('d/m/Y') : '', ['class' => 'form-control datetime']) !!}
    <span class="help-block">{{ $errors->first('end_date') }}</span>

    {!! Form::label('percentaje', 'Porcentaje') !!}
    {!! Form::select('percentaje', $percentajes, isset($extraHour) ? $extraHour->percentaje : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('percentaje_id') }}</span>

  </div>
	
	<div class="col-md-8">
          	
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', isset($extraHour) ? $extraHour->description : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('descripcion') }}</span>
      
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

