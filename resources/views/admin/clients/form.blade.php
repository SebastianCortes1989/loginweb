<div class="row">
	<div class="col-md-4">
		
		  <div class="form-group">
        	{!! Form::label('rut', 'R.U.T.') !!}
          {!! Form::text('rut', '', ['class' => 'form-control rut']) !!}
          <span class="help-text">{{ $errors->first('rut') }}</span>
      </div>        

      <div class="form-group">
        	{!! Form::label('name', 'Nombre Corto') !!}
          {!! Form::text('name', '', ['class' => 'form-control']) !!}
          <span class="help-text">{{ $errors->first('name') }}</span>
      </div>

      <div class="form-group">        	
        	{!! Form::label('social_reason', 'Razón Social') !!}
          {!! Form::textarea('social_reason', '', ['class' => 'form-control']) !!}
          <span class="help-text">{{ $errors->first('social_reason') }}</span>
      </div>

      <div class="form-group">
          {!! Form::label('gyre', 'Giro') !!}
          {!! Form::textarea('gyre', '', ['class' => 'form-control']) !!}
          <span class="help-text">{{ $errors->first('gyre') }}</span>
      </div>

	</div>

  <div class="col-md-4">
		      
		  <div class="form-group">
      	{!! Form::label('address', 'Dirección') !!}
        {!! Form::text('address', '', ['class' => 'form-control']) !!}
        <span class="help-text">{{ $errors->first('address') }}</span>
      </div>        

      {!! Form::label('region_id', 'Región') !!}
      {!! Form::select('region_id', $regions, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('region_id') }}</span>

      {!! Form::label('city_id', 'Ciudad') !!}
      {!! Form::select('city_id', $cities, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('city_id') }}</span>

      {!! Form::label('commune_id', 'Comuna') !!}
      {!! Form::select('commune_id', $communes, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('commune_id') }}</span>

      <div class="form-group">
      	{!! Form::label('phone', 'Teléfono') !!}
        {!! Form::text('phone', '', ['class'=>'form-control']) !!}
        <span class="help-text">{{ $errors->first('phone') }}</span>
      </div>

      <div class="form-group">
      	{!! Form::label('password', 'Clave') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
        <span class="help-text">{{ $errors->first('password') }}</span>
      </div>

      <div class="form-group">
      	{!! Form::label('email', 'E-mail') !!}
        {!! Form::email('email', '', ['class'=>'form-control']) !!}
        <span class="help-text">{{ $errors->first('email') }}</span>
      </div>        

	</div>

  <div class="col-md-4">
		
		<div class="form-group">
      	{!! Form::label('name_representative', 'Nombre Representante') !!}
        {!! Form::text('name_representative', '', ['class'=>'form-control']) !!}
        <span class="help-text">{{ $errors->first('name_representative') }}</span>
      </div>

      <div class="form-group">
      	{!! Form::label('rut_representative', 'R.U.T. Representante') !!}
        {!! Form::text('rut_representative', '', ['class'=>'form-control rut']) !!}
        <span class="help-text">{{ $errors->first('rut_representative') }}</span>
      </div>
    

      @foreach($insurances as $id => $name)
        
        <p>
          {!! Form::radio('insurance_id', $id, false, ['id' => 'insurance_id'.$id, 'class' => 'with-gap']) !!}
          {!! Form::label('insurance_id'.$id, $name) !!}
          <span class="help-text">{{ $errors->first('insurance_id') }}</span>
        </p>

      @endforeach        

      <br>

      {!! Form::label('complementary', 'Seguro Complementario') !!}
      {!! Form::select('complementary', $complementaries, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('complementary') }}</span>

      {!! Form::label('compensacion', 'Caja de Compensación') !!}
      {!! Form::select('compensacion', $compensacions, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('compensacion') }}</span>

      <div class="form-group">
      	{!! Form::label('mideplan', 'N° Registro Mideplan') !!}
        {!! Form::text('mideplan', '', ['class'=>'form-control']) !!}
        <span class="help-text">{{ $errors->first('mideplan') }}</span>
      </div>

      <div class="file-field form-group">
    	<div class="btn">
        	<span>Logo</span>
        	{!! Form::file('logo') !!}
      	</div>
      	<div class="file-path-wrapper">
        	<input class="file-path form-control" type="text">
      	</div>
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
