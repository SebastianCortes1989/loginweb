<div class="row">
		<div class="col-md-4">
        
      {!! Form::label('ammount', 'Monto') !!}
      {!! Form::number('ammount', isset($viatical) ? $viatical->ammount : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('ammount') }}</span>

      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, isset($viatical) ? $viatical->employee_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('employee_id') }}</span>

      {!! Form::label('type_id', 'Tipo') !!}
      {!! Form::select('type_id', $viaticalsTypes, isset($viatical) ? $viatical->type_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('type_id') }}</span>

      {!! Form::label('date', 'Fecha') !!}
      {!! Form::text('date', isset($viatical) ? $viatical->date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
      <span class="help-block">{{ $errors->first('date') }}</span>

    </div>
		
		<div class="col-md-8">
                    
    	{!! Form::label('description', 'Descripción') !!}
      {!! Form::textarea('description', isset($viatical) ? $viatical->description : '', ['class' => 'form-control', 'rows' => 50]) !!}
      <span class="help-block">{{ $errors->first('description') }}</span>
        
		</div>

</div>

<div class="row">
	<div class="col-md-12">	    	    	
      <button class="btn btn-primary" type="submit" name="action">
      			Guardar
			</button>
    </div>
</div>