<div class="row">
		<div class="col-md-3">

      {!! Form::label('type_id', 'Tipo') !!}
      {!! Form::select('type_id', $types, isset($ccaf) ? $ccaf->type_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('type_id') }}</span>
        
		</div>

    <div class="col-md-3">

      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, isset($ccaf) ? $ccaf->employee_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('employee_id') }}</span>

      {!! Form::label('compensacion_id', 'Caja de Compensación') !!}
      {!! Form::select('compensacion_id', $compensacions, isset($ccaf) ? $ccaf->compensacion_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('compensacion_id') }}</span>

    </div>

    <div class="col-md-3">

      
      {!! Form::label('quotas', 'Cuotas') !!}
      {!! Form::number('quotas', isset($ccaf) ? $ccaf->quotas : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('quotas') }}</span>
    
      {!! Form::label('ammount', 'Monto') !!}
      {!! Form::number('ammount', isset($ccaf) ? $ccaf->ammount : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('ammount') }}</span>

    </div>
		
		<div class="col-md-3">

      {!! Form::label('month', 'Mes') !!}
      {!! Form::select('month', config('options.month'), isset($ccaf) ? $ccaf->month : date('m'), ['class' => 'form-control']) !!}        
      <span class="help-block">{{ $errors->first('month') }}</span>

      {!! Form::label('year', 'Año') !!}
      {!! Form::selectYear('year', 2014, 2025, isset($ccaf) ? $ccaf->year : date('Y'), ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('year') }}</span>
        
		</div>

</div>

<div class="row">
	<div class="col-md-12">	    	
    	
      <button class="btn btn-primary " type="submit" name="action">
      			Guardar
			</button>
    </div>
</div>
