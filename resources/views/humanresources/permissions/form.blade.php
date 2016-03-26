<div class="row">
	<div class="col-md-4">

    {!! Form::label('employee_id', 'Trabajador') !!}
    {!! Form::select('employee_id', $employees, isset($permission) ? $permission->employee_id : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('employee_id') }}</span>  
  
    {!! Form::label('start_date', 'Fecha de Inicio') !!}
    {!! Form::text('start_date', isset($permission) ? $permission->start_date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
    <span class="help-block">{{ $errors->first('start_date') }}</span>

  
    {!! Form::label('end_date', 'Fecha de Término') !!}
    {!! Form::text('end_date', isset($permission) ? $permission->end_date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
    <span class="help-block">{{ $errors->first('end_date') }}</span>
      
    {!! Form::label('type_id', 'Tipo') !!}
    {!! Form::select('type_id', $permissionsTypes, isset($permission) ? $permission->type_id : '', ['class' => 'form-control']) !!}
    <span class="help-block">{{ $errors->first('type_id') }}</span>
    
  </div>
	
	<div class="col-md-8">
    
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', isset($permission) ? $permission->description : '', ['class' => 'form-control']) !!}
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