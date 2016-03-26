@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Remuneración</h3>

{!! Form::open(['action' => 'HumanResources\ContractController@remunerationsStore']) !!}

  {!! Form::hidden('contract_id', $contract->id) !!}

	<div class="row">
      <div class="col-md-4">
        
              {!! Form::number('base', '', ['class' => 'form-control']) !!}
              {!! Form::label('base', 'Sueldo Base') !!}
          </div>

          
              {!! Form::number('collation', '', ['class' => 'form-control']) !!}
              {!! Form::label('collation', 'Colación') !!}
          </div>
      </div>

      <div class="col-md-4">
        
              {!! Form::number('liquid', '', ['class' => 'form-control']) !!}
              {!! Form::label('liquid', 'Sueldo Líquido') !!}
          </div>

          
              {!! Form::number('mobilization', '', ['class' => 'form-control']) !!}
              {!! Form::label('mobilization', 'Movilización') !!}
          </div>
      </div>

      <div class="col-md-4">
          
          </div>

          
              {!! Form::number('tools', '', ['class' => 'form-control']) !!}
              {!! Form::label('tools', 'Desgaste de Herramientas') !!}
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