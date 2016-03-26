<div class="row">
	 <div class="col-md-3">

    {!! Form::label('type_id', 'Tipo') !!}
    {!! Form::select('type_id', $loanTypes, isset($loan) ? $loan->type_id : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('type_id') }}</span>
      
	</div>

  <div class="col-md-3">

    {!! Form::label('employee_id', 'Trabajador') !!}
    {!! Form::select('employee_id', $employees, isset($loan) ? $loan->employee_id : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('employee_id') }}</span>

    
    {!! Form::label('ammount', 'Monto') !!}
    {!! Form::number('ammount', isset($loan) ? $loan->ammount : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('ammount') }}</span>

  </div>

  <div class="col-md-3">

  
    {!! Form::label('quotas', 'Cuotas') !!}
    {!! Form::number('quotas', isset($loan) ? $loan->quotas : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('quotas') }}</span>

  
    {!! Form::label('grant_date', 'Fecha de Otorgamiento') !!}
    {!! Form::text('grant_date', isset($loan) ? $loan->grant_date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
    <span class="help-block">{{ $errors->first('grant_date') }}</span>

  </div>
	
	<div class="col-md-3">

    {!! Form::label('day', 'Día') !!}
    {!! Form::selectRange('day', 1, 31, isset($loan) ? $loan->day : date('d'), ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('day') }}</span>

    {!! Form::label('month', 'Mes') !!}
    {!! Form::select('month', config('options.month'), isset($loan) ? $loan->month : date('m'), ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('month') }}</span>

    {!! Form::label('year', 'Año') !!}
    {!! Form::selectYear('year', 2014, 2025, isset($loan) ? $loan->year : date('Y'), ['class' => 'form-control']) !!}
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
</div>
