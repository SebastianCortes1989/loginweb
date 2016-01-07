@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\ContractController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Contratos</h5>
    	<hr>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Tipo de Contrato</th>
	              	<th>Fecha de Inicio</th>
	              	<th>Fecha de Término</th>
	              	<th>Cargo</th>
	              	<th>Sueldo Base</th>
	              	<th>Sueldo Liquido</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
				@foreach($contracts as $contract)
					<tr>
						<td>{{ $contract->code() }}</td>
						<td>{{ $contract->employee ? $contract->employee->name : '' }}</td>
						<td>{{ $contract->contractType ? $contract->contractType->name : '' }}</td>
						<td>{{ $contract->start_date->format('d/m/Y') }}</td>
						<td>{{ $contract->end_date->format('d/m/Y') }}</td>
						<td>{{ $contract->charge ? $contract->charge->name : '' }}</td>
						<td>{{ $contract->base }}</td>
						<td>{{ $contract->liquid }}</td>
						<td>
		              		<a href="{{ action('HumanResources\Pdf\ContractController@view', [$contract->id]) }}">Ver PDF</a>
		              	</td>
					</tr>
				@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection