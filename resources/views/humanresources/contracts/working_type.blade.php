@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Jornada</h3>

{!! Form::open(['action' => 'HumanResources\ContractController@workingTypeStore']) !!}

  {!! Form::hidden('contract_id', $contract->id) !!}

	<table>
    <thead>
      <tr>
        <th>Día de Inicio</th>
        <th>Día de Termino</th>
        <th>Hora de Inicio</th>
        <th>Hora de Termino</th>
        <th>Colación</th>
      </tr>
    </thead> 

    <tbody>
      <tr>
        <td>{!! Form::select('day_start', $days, '', ['class' => 'form-control']) !!}</td>
        <td>{!! Form::select('day_start', $days, '', ['class' => 'form-control']) !!}</td>
        <td>{!! Form::text('hour_start', '', ['class' => 'form-control']) !!}</td>
        <td>{!! Form::text('hour_end', '', ['class' => 'form-control']) !!}</td>
        <td>{!! Form::number('collation', '', ['class' => 'form-control']) !!}</td>
      </tr>
    </tbody>
  </table>

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