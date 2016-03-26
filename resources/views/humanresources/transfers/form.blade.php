<div class="row">
		<div class="col-md-3">

      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, isset($transfer) ? $transfer->employee_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('employee_id') }}</span>
        
		</div>

    <div class="col-md-3">
      
      {!! Form::label('start_date', 'Fecha de Inicio') !!}
      {!! Form::text('start_date', isset($transfer) ? $transfer->start_date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
      <span class="help-block">{{ $errors->first('start_date') }}</span>
      
      {!! Form::label('end_date', 'Fecha de Término') !!}
      {!! Form::text('end_date', isset($transfer) ? $transfer->end_date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
      <span class="help-block">{{ $errors->first('end_date') }}</span>

    </div>
		
		<div class="col-md-3">

      {!! Form::label('cause_id', 'Causa') !!}
      {!! Form::select('cause_id', $causes, isset($transfer) ? $transfer->cause_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('cause_id') }}</span>
        
		</div>

    <div class="col-md-3">          

      {!! Form::label('from_branch_id', 'Sucursal de Origen') !!}
      {!! Form::select('from_branch_id', $branchs, isset($transfer) ? $transfer->from_branch_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('from_branch_id') }}</span>

      {!! Form::label('to_branch_id', 'Sucursal Transferida') !!}
      {!! Form::select('to_branch_id', $branchs, isset($transfer) ? $transfer->to_branch_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('to_branch_id') }}</span>
        
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