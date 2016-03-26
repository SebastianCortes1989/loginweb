@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Finiquitos
    		<a href="{{ action('HumanResources\SettlementController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Causal</th>
	              	<th>Fecha</th>
	              	<th>Monto</th>
	              	<th>Carta</th>
	              	<th>Scan AFC</th>
	              	<th>Scan Previred</th>
	              	<th>Scan Finiquito</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($settlements as $settlement)
	        		<tr>
	        			<td>{{ $settlement->code() }}</td>
	        			<td>{{ $settlement->employee->name }}</td>
	        			<td>{{ $settlement->causal->name }}</td>
	        			<td>{{ $settlement->date->format('d/m/Y') }}</td>
	        			<td>{{ $settlement->ammount }}</td>
	        			<td>{{ $settlement->letter->code() }}</td>
	        			<td></td>
	        			<td></td>
	        			<td></td>
	        			<td>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\SettlementController@edit', [$settlement->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\SettlementController@view', [$settlement->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach  	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection