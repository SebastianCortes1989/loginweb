<div class="row">  		
  <div class="col-md-3">

    {!! Form::label('employee_id', 'Trabajador') !!}
    {!! Form::select('employee_id', $employees, isset($saving) ? $saving->employee_id : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('employee_id') }}</span>

  </div>

  <div class="col-md-3">

    {!! Form::label('type_id', 'Tipo') !!}
    {!! Form::select('type_id', $savingTypes, isset($saving) ? $saving->type_id : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('type_id') }}</span>

  </div>
	
	<div class="col-md-3">
    
    {!! Form::label('ammount', 'Monto') !!}
    {!! Form::number('ammount', isset($saving) ? $saving->ammount : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('ammount') }}</span>
      
	</div>

</div>

<div class="row">
  <div class="col-md-12">	    	
    <button class="btn btn-primary " type="submit" name="action">
    			Guardar
		</button>
  </div>
</div>
