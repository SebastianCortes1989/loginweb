<div class="row">
		<div class="col-md-4">
      
      {!! Form::label('ammount', 'Monto') !!}
      {!! Form::number('ammount', isset($bond) ? $bond->ammount : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('ammount') }}</span>
    
      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, isset($bond) ? $bond->employee_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('employee_id') }}</span>

      {!! Form::label('type_id', 'Tipo') !!}
      {!! Form::select('type_id', $bondsTypes, isset($bond) ? $bond->type_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('type_id') }}</span>

      {!! Form::label('date', 'Fecha') !!}
      {!! Form::text('date', isset($bond) ? $bond->date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
      <span class="help-block">{{ $errors->first('date') }}</span>

    </div>
		
		<div class="col-md-8">

  		{!! Form::label('description', 'Descripción') !!}
      {!! Form::textarea('description', isset($bond) ? $bond->description : '', ['class' => 'form-control']) !!}
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