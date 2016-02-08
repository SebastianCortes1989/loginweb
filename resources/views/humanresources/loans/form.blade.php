<div class="row">
		  <div class="col m3">

      {!! Form::label('type_id', 'Tipo') !!}
      {!! Form::select('type_id', $loanTypes, isset($loan) ? $loan->type_id : '', ['class' => 'browser-default']) !!}
      <span class="red-text">{{ $errors->first('type_id') }}</span>
        
		</div>

    <div class="col m3">

      {!! Form::label('employee_id', 'Trabajador') !!}
      {!! Form::select('employee_id', $employees, isset($loan) ? $loan->employee_id : '', ['class' => 'browser-default']) !!}
      <span class="red-text">{{ $errors->first('employee_id') }}</span>

      <div class="input-field">
        {!! Form::number('ammount', isset($loan) ? $loan->ammount : '', ['class' => 'validate']) !!}
        {!! Form::label('ammount', 'Monto') !!}
        <span class="red-text">{{ $errors->first('ammount') }}</span>
      </div>

    </div>

     <div class="col m3">

        <div class="input-field">
          {!! Form::number('quotas', isset($loan) ? $loan->quotas : '', ['class' => 'validate']) !!}
          {!! Form::label('quotas', 'Cuotas') !!}
          <span class="red-text">{{ $errors->first('quotas') }}</span>
        </div>

        <div class="input-field">
          {!! Form::text('grant_date', isset($loan) ? $loan->grant_date->format('d/m/Y') : '', ['class' => 'validate date']) !!}
          {!! Form::label('grant_date', 'Fecha de Otorgamiento') !!}
          <span class="red-text">{{ $errors->first('grant_date') }}</span>
        </div>          

    </div>
		
		<div class="col m3">

        {!! Form::label('day', 'Día') !!}
        {!! Form::selectRange('day', 1, 31, isset($loan) ? $loan->day : date('d'), ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('day') }}</span>

        {!! Form::label('month', 'Mes') !!}
        {!! Form::select('month', config('options.month'), isset($loan) ? $loan->month : date('m'), ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('month') }}</span>

        {!! Form::label('year', 'Año') !!}
        {!! Form::selectYear('year', 2014, 2025, isset($loan) ? $loan->year : date('Y'), ['class' => 'browser-default']) !!}
        <span class="red-text">{{ $errors->first('year') }}</span>
        
		</div>

</div>

<div class="row">
	  <div class="col s12 m12">	    	
    	<div class="card-panel blue-grey lighten-5">
      	<button class="btn btn-large waves-effect waves-light purple darken-1" type="submit" name="action">
      		Guardar
			  </button>
    	</div>
    </div>
</div>
