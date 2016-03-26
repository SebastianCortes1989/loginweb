<div class="row">
    <div class="col-md-4">

      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, isset($antique) ? $antique->employee_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('employee_id') }}</span>

    </div>
	
		<div class="col-md-4">
      
      {!! Form::label('date', 'Fecha') !!}
      {!! Form::text('date', isset($antique) ? $antique->date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
      <span class="help-block">{{ $errors->first('date') }}</span>
    
		</div>

</div>

<div class="row">
	<div class="col-md-12">	    	    	
      <button class="btn btn-primary " type="submit" name="action">
      			Guardar
			</button>
    </div>
</div>
