@extends('default')

@section('content')

<h3 class="text-center">Registrar Gerencia</h3>


{!! Form::open(['action' => 'Entity\ManagementController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  <div class="row">

    <div class="col-md-4">
  		
      <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', '', ['class' => 'form-control']) !!}
          <span class="help-text">{{ $errors->first('name') }}</span>
      </div>      
  		
  	</div>

  	<div class="col-md-4">
  		
      {!! Form::label('responsible_id', 'Responsable') !!}
      {!! Form::select('responsible_id', $employees, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('responsible_id') }}</span>

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