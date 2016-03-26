@extends('default')

@section('content')


<h3 class="text-center">Registrar Unidad</h3>


{!! Form::open(['action' => 'Entity\UnitController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

 <div class="row">

    <div class="col-md-3">      
      <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', '', ['class' => 'form-control']) !!}
          <span class="help-text">{{ $errors->first('name') }}</span>
      </div>        		
  	</div>

    <div class="col-md-3">      
      {!! Form::label('employee_id', 'Responsable') !!}
      {!! Form::select('employee_id', $employees, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('employee_id') }}</span>
  	</div>

    <div class="col-md-3">      
      {!! Form::label('management_id', 'Gerencia') !!}
      {!! Form::select('management_id', $managements, '', ['class' => 'form-control']) !!}
      <span class="help-text">{{ $errors->first('management_id') }}</span>
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