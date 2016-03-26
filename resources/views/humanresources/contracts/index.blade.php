@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 style="text-align:center">
    		Contratos
    		<a href="{{ action('HumanResources\ContractController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>R.U.T.</th>
	              	<th>Tipo de Contrato</th>
	              	<th>Fecha de Inicio</th>
	              	<th>Fecha de Término</th>
	              	<th>Cargo</th>
	              	<th>AFP</th>
	              	<th>Salud</th>
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
						<td>{{ $contract->employee ? $contract->employee->rut : '' }}</td>
						<td>{{ $contract->contractType ? $contract->contractType->name : '' }}</td>
						<td>{{ $contract->start_date->format('d/m/Y') }}</td>
						<td>{{ $contract->end_date->format('d/m/Y') }}</td>
						<td>{{ $contract->charge ? $contract->charge->name : '' }}</td>
						<td>{{ $contract->employee->afp ? $contract->employee->afp->name : '' }}</td>
						<td>{{ $contract->employee->health ? $contract->employee->health->name : '' }}</td>
						<td>{{ $contract->base }}</td>
						<td>{{ $contract->liquid }}</td>
						<td>
		              		<a href="{{ action('HumanResources\Pdf\ContractController@view', [$contract->id]) }}" class="btn btn-xs btn-rrhh btn-primary">Ver PDF</a>
		              	</td>
					</tr>
				@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection