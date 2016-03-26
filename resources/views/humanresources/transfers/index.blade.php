@extends('default')

@section('content')

	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	    				    
	</div>

	@include('humanresources.menu')

	<h5 class="deep-purple-text center-align">
		Traslados
		<a href="{{ action('HumanResources\TransferController@create') }}" class="btn btn-primary btn-rrhh pull-right">
	    	Nuevo
	    </a>
	</h3>
	<br>
	
	<table class="table table-bordered">
        <thead>
          	<tr>
          		<th>Código</th>
              	<th>Trabajador</th>
              	<th>Fecha de Inicio</th>
              	<th>Fecha de Término</th>
              	<th>Sucursal de Origen</th>
              	<th>Sucursal de Traslado</th>
              	<th></th>
          	</tr>
        </thead>

        <tbody>
        	@foreach($transfers as $transfer)
        		<tr>
	          		<td>{{ $transfer->code() }}</td>
	              	<td>{{ $transfer->employee->name }}</td>
	              	<td>{{ $transfer->start_date->format('d/m/Y') }}</td>
	              	<td>{{ $transfer->end_date->format('d/m/Y') }}</td>
	              	<td>{{ $transfer->fromBranch->name }}</td>
	              	<td>{{ $transfer->toBranch->name }}</td>
	          		<td>
	              		<a class="btn btn-primary btn-xs" href="{{ action('HumanResources\TransferController@edit', [$transfer->id]) }}">Editar</a>
	              		<a class="btn btn-primary btn-xs" href="{{ action('HumanResources\Pdf\TransferController@view', [$transfer->id]) }}">Ver PDF</a>
	              	</td>
	          	</tr>
        	@endforeach
        </tbody>
	</table>


@endsection