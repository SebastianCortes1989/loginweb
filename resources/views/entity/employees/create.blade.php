@extends('default')

@section('content')

<h3 class="text-center">Registrar Trabajador</h3>


{!! Form::open(['action' => 'Entity\EmployeeController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  <div class="row">
  	<div class="col-md-3">
  		
  		  <div class="form-group">
          	{!! Form::label('rut', 'R.U.T.') !!}
            {!! Form::text('rut', '', ['class' => 'form-control']) !!}
            <span class="help-text">{{ $errors->first('rut') }}</span>
        </div>

        <div class="form-group">
          	{!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', '', ['class' => 'form-control']) !!}
            <span class="help-text">{{ $errors->first('name') }}</span>
        </div>

        <div class="form-group">        	
          	{!! Form::label('birthday', 'Fecha de Nacimiento') !!}
            {!! Form::text('birthday', '', ['class' => 'form-control date']) !!}
            <span class="help-text">{{ $errors->first('birthday') }}</span>
        </div>

        <div class="form-group">
	          {!! Form::label('address', 'Dirección') !!}
            {!! Form::text('address', '', ['class' => 'form-control']) !!}
            <span class="help-text">{{ $errors->first('address') }}</span>
        </div>

  	</div>

  	<div class="col-md-3">
  		
  		  <div class="form-group">
        	{!! Form::label('phone', 'Teléfono') !!}
          {!! Form::text('phone', '', ['class' => 'form-control']) !!}
          <span class="help-text">{{ $errors->first('phone') }}</span>
        </div>

        <div class="form-group">
          {!! Form::label('movil_phone', 'Teléfono Celular') !!}
          {!! Form::text('movil_phone', '', ['class' => 'form-control']) !!}
        </div>

        {!! Form::label('nationality_id', 'Nacionalidad') !!}
       	{!! Form::select('nationality_id', $nacionalities, '', ['class' => 'form-control']) !!}
        <span class="help-text">{{ $errors->first('nationality_id') }}</span>

        {!! Form::label('city_id', 'Ciudad') !!}
        {!! Form::select('city_id', $cities, '', ['class' => 'form-control']) !!}
        <span class="help-text">{{ $errors->first('city_id') }}</span>

        {!! Form::label('commune_id', 'Comuna') !!}
      	{!! Form::select('commune_id', $communes, '', ['class' => 'form-control']) !!}
        <span class="help-text">{{ $errors->first('commune_id') }}</span>

        <div class="form-group">
        	{!! Form::label('passport', 'Pasaporte') !!}
          {!! Form::text('passport', '', ['class'=>'form-control']) !!}
        </div>      

  	</div>

  	<div class="col-md-3">
  		
      {!! Form::label('type_id', 'Tipo de Empleado') !!}
      {!! Form::select('type_id', $employeeTypes, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('type_id') }}</span>

      {!! Form::label('afc_id', 'AFC') !!}
      {!! Form::select('afc_id', $afc, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('afc_id') }}</span>

      {!! Form::label('afp_id', 'AFP') !!}
      {!! Form::select('afp_id', $afp, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('afp_id') }}</span>

      {!! Form::label('apv_id', 'APV') !!}
      {!! Form::select('apv_id', $apv, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('apv_id') }}</span>

      {!! Form::label('bank_id', 'Banco') !!}
      {!! Form::select('bank_id', $banks, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('bank_id') }}</span>

      {!! Form::label('account_type_id', 'Tipo de Cuenta') !!}
      {!! Form::select('account_type_id', $accountTypes, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('account_type_id') }}</span>

      <div class="form-group">
        {!! Form::label('account_number', 'N° de Cuenta') !!}
        {!! Form::text('account_number', '', ['class' => 'form-control']) !!}
      </div>   	

  	</div> 

    <div class="col-md-3">

      {!! Form::label('health_id', 'Tipo de Salud') !!}
      {!! Form::select('health_id', $healths, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('health_id') }}</span>

      <div class="form-group">
        {!! Form::label('ges', 'GES') !!}
        {!! Form::text('ges', '', ['class' => 'form-control']) !!}
        <span class="help-text">{{ $errors->first('ges') }}</span>
      </div> 

      <div class="form-group">
        {!! Form::label('plan_value', 'Valor de Plan') !!}
        {!! Form::text('plan_value', '', ['class' => 'form-control']) !!}
      </div> 

      {!! Form::label('family_charge', 'Cargas Familiares') !!}
      {!! Form::select('family_charge', $familyCharges, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('family_charge') }}</span>

      <div class="form-group">
        {!! Form::label('famliar_charge', 'Familiares') !!}
        {!! Form::text('familiars', '', ['class' => 'form-control']) !!}
      </div> 

      <div class="form-group">
        {!! Form::label('famliar_charge', 'Maternales') !!}
        {!! Form::text('maternals', '', ['class' => 'form-control']) !!}
      </div> 

      <div class="form-group">
        {!! Form::label('invalidates', 'Invalidas') !!}
        {!! Form::text('invalidates', '', ['class' => 'form-control']) !!}
      </div> 

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

{!! Form::close() !!}

@endsection