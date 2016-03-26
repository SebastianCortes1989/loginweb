@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Préstamos Personales
    		<a href="{{ action('HumanResources\LoanController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Cuotas</th>
	              	<th>Monto</th>
	              	<th>Fecha de Otorgamiento</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($loans as $loan)
	        		<tr>
	        			<td>{{ $loan->code() }}</td>
	        			<td>{{ $loan->employee->name }}</td>
	        			<td>{{ $loan->quotas }}</td>
	        			<td>{{ $loan->ammount }}</td>
	        			<td>{{ $loan->grant_date->format('d/m/Y') }}</td>
	        			<td>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\LoanController@edit', [$loan->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\LoanController@view', [$loan->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach		       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection