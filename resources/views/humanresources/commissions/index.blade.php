@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Comisiones
    		<a href="{{ action('HumanResources\CommissionController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Tipo</th>
	              	<th>Fecha</th>
	              	<th>Monto</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($commissions as $commission)
	        		<tr>
	        			<td>{{ $commission->code() }}</td>
	        			<td>{{ $commission->employee->name }}</td>
	        			<td>{{ $commission->type ? $commission->type->name : '' }}</td>
	        			<td>{{ $commission->date->format('d/m/Y') }}</td>
	        			<td>{{ $commission->ammount }}</td>
	        			<td>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\CommissionController@edit', [$commission->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\CommissionController@view', [$commission->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection