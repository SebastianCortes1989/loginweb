<div class="row">
		<div class="col-md-4">

      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, (isset($letter)) ? $letter->employee_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('employee_id') }}</span> 
  
      {!! Form::label('notice_date', 'Fecha de Aviso') !!}
      {!! Form::text('notice_date', (isset($letter)) ? $letter->notice_date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
      <span class="help-block">{{ $errors->first('notice_date') }}</span>

    
      {!! Form::label('settlement_date', 'Fecha de Finiquitación') !!}
      {!! Form::text('settlement_date', (isset($letter)) ? $letter->settlement_date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
      <span class="help-block">{{ $errors->first('settlement_date') }}</span>

      {!! Form::label('causal_id', 'Causal') !!}
      {!! Form::select('causal_id', $causals, (isset($letter)) ? $letter->causal_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('causal_id') }}</span>
    
    </div>
		
		<div class="col-md-8">
            
      {!! Form::label('fact', 'Hecho que respalda Causal') !!}
      {!! Form::textarea('fact', (isset($letter)) ? $letter->fact : '', ['class' => 'form-control']) !!}
      
		</div>

</div>

<div class="row">
	<div class="col-md-12">	    	
      <button class="btn btn-primary " type="submit" name="action">
      			Guardar
			</button>
    </div>
</div>
