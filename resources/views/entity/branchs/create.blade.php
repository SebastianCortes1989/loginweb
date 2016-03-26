@extends('default')

@section('content')

<h3 class="text-center">Registrar Sucursal</h3>


{!! Form::open(['action' => 'Entity\BranchController@store']) !!}

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
  		
  		<div class="form-group">
          {!! Form::label('address', 'Dirección') !!}
          {!! Form::text('address', '', ['class' => 'form-control']) !!}
          <span class="help-text">{{ $errors->first('address') }}</span>
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
</div>
    	
{!! Form::close() !!}

@endsection