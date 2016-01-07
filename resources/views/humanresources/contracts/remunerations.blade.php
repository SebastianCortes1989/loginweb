@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Remuneración</h5>

{!! Form::open(['action' => 'HumanResources\ContractController@remunerationsStore']) !!}

  {!! Form::hidden('contract_id', $contract->id) !!}

	<div class="row">
      <div class="col m4">
        <div class="input-field">
              {!! Form::number('base', '', ['class' => 'validate']) !!}
              {!! Form::label('base', 'Sueldo Base') !!}
          </div>

          <div class="input-field">
              {!! Form::number('collation', '', ['class' => 'validate']) !!}
              {!! Form::label('collation', 'Colación') !!}
          </div>
      </div>

      <div class="col m4">
        <div class="input-field">
              {!! Form::number('liquid', '', ['class' => 'validate']) !!}
              {!! Form::label('liquid', 'Sueldo Líquido') !!}
          </div>

          <div class="input-field">
              {!! Form::number('mobilization', '', ['class' => 'validate']) !!}
              {!! Form::label('mobilization', 'Movilización') !!}
          </div>
      </div>

      <div class="col m4">
          <div class="input-field">
          </div>

          <div class="input-field">
              {!! Form::number('tools', '', ['class' => 'validate']) !!}
              {!! Form::label('tools', 'Desgaste de Herramientas') !!}
          </div>
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

{!! Form::close() !!}

@endsection