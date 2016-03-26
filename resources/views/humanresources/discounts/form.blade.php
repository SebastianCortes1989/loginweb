<div class="row">
	<div class="col-md-4">  			 

    {!! Form::label('employee_id', 'Trabajador') !!}
    {!! Form::select('employee_id', $employees, isset($discount) ? $discount->employee_id : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('employee_id') }}</span>

    {!! Form::label('quotas', 'Cuotas') !!}
    {!! Form::number('quotas', isset($discount) ? $discount->quotas : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('quotas') }}</span>

  
    {!! Form::label('ammount', 'Monto') !!}
    {!! Form::number('ammount', isset($discount) ? $discount->ammount : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('ammount') }}</span>

    {!! Form::label('date', 'Fecha') !!}
    {!! Form::text('date', isset($discount) ? $discount->date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
    <span class="help-block">{{ $errors->first('date') }}</span>
    
  </div>
    
	<div class="col-md-8">
 
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
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
