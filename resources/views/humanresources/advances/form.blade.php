<div class="row">
		<div class="col-md-4">  			  
          
      {!! Form::label('ammount', 'Monto') !!}
      {!! Form::number('ammount', isset($advance) ? $advance->ammount : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('ammount') }}</span>

      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, isset($advance) ? $advance->employee_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('employee_id') }}</span>

      {!! Form::label('type_id', 'Tipo') !!}
      {!! Form::select('type_id', $advancesTypes, isset($advance) ? $advance->type_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('type_id') }}</span>

      {!! Form::label('date', 'Fecha') !!}
      {!! Form::text('date', isset($advance) ? $advance->date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
      <span class="help-block">{{ $errors->first('date') }}</span>

    </div>
		
		<div class="col-md-8">
                  
  		{!! Form::label('description', 'Descripción') !!}
      {!! Form::textarea('description', isset($advance) ? $advance->description : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('description') }}</span>
  
		</div>

	</div>

<div class="row">
	<div class="col-md-12">	    	    	
      <button class="btn btn-primary " type="submit" name="action">
      	Guardar
			</button>
    </div>
</div>
