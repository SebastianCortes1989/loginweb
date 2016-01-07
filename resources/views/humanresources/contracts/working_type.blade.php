@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Jornada</h5>

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
        <td>{!! Form::select('day_start', $days, '', ['class' => 'browser-default']) !!}</td>
        <td>{!! Form::select('day_start', $days, '', ['class' => 'browser-default']) !!}</td>
        <td>{!! Form::text('hour_start', '', ['class' => 'validate']) !!}</td>
        <td>{!! Form::text('hour_end', '', ['class' => 'validate']) !!}</td>
        <td>{!! Form::number('collation', '', ['class' => 'validate']) !!}</td>
      </tr>
    </tbody>
  </table>

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