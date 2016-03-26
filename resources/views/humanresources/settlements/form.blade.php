<div class="row">
		<div class="col-md-3">

      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, (isset($settlement)) ? $settlement->employee_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('employee_id') }}</span>

      {!! Form::label('causal_id', 'Causal') !!}
      {!! Form::select('causal_id', $causals, (isset($settlement)) ? $settlement->causal_id : '', ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('causal_id') }}</span>

      {!! Form::label('date', 'Fecha de Emisión') !!}
      {!! Form::text('date', (isset($settlement)) ? $settlement->date->format('d/m/Y') : '', ['class' => 'form-control date']) !!}
      <span class="help-block">{{ $errors->first('date') }}</span>
        
		</div>

    <div class="col-md-4">    
        
      {!! Form::label('proportional_holidays', 'Vacaciones Proporcionales') !!}
      {!! Form::number('proportional_holidays', (isset($settlement)) ? $settlement->proportional_holidays : '', ['class' => 'form-control']) !!}
    
      {!! Form::label('substitute_compensation', 'Indem. Sustitutiva') !!}
      {!! Form::number('substitute_compensation', (isset($settlement)) ? $settlement->substitute_compensation : '', ['class' => 'form-control']) !!}
    
      {!! Form::label('service_years', 'Indem. Años de Servicio') !!}
      {!! Form::number('service_years', (isset($settlement)) ? $settlement->service_years : '', ['class' => 'form-control']) !!}
    
      {!! Form::label('substitute_agreed', 'Indem. Pactada') !!}
      {!! Form::number('substitute_agreed', (isset($settlement)) ? $settlement->substitute_agreed : '', ['class' => 'form-control']) !!}
    
      {!! Form::label('substitute_voluntary', 'Indem. Voluntaria') !!}
      {!! Form::number('substitute_voluntary', (isset($settlement)) ? $settlement->substitute_voluntary : '', ['class' => 'form-control']) !!}
    
      {!! Form::label('legal_holidays', 'Días Vacaciones Legales Pendientes') !!}
      {!! Form::number('legal_holidays', (isset($settlement)) ? $settlement->legal_holidays : '', ['class' => 'form-control']) !!}

    </div>
		
		<div class="col-md-4">
        
      {!! Form::label('afc', 'Aporte Empleador AFC') !!}
      {!! Form::number('afc', (isset($settlement)) ? $settlement->afc : '', ['class' => 'form-control']) !!}
    
      {!! Form::label('compensacion_loans', 'Prestamos CCAF') !!}
      {!! Form::number('compensacion_loans', (isset($settlement)) ? $settlement->compensacion_loans : '', ['class' => 'form-control']) !!}
    
      {!! Form::label('petty_cash', 'Dif. de Rend. Caja Chica') !!}
      {!! Form::number('petty_cash', (isset($settlement)) ? $settlement->petty_cash : '', ['class' => 'form-control']) !!}
    
      {!! Form::label('discounts_others', 'Otros Descuentos') !!}
      {!! Form::number('discounts_others', (isset($settlement)) ? $settlement->discount_others : '', ['class' => 'form-control']) !!}
    
      {!! Form::label('severals', 'Especificar') !!}
      {!! Form::number('severals', (isset($settlement)) ? $settlement->seveals : '', ['class' => 'form-control']) !!}
    
		</div>

</div>

<div class="row">
	<div class="col-md-12">	    	
      <button class="btn btn-primary " type="submit" name="action">
      			Guardar
			</button>
    </div>
</div>
