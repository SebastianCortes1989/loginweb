@extends('default')

@section('content')

@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">
    	<h5 class="text-center">
    		Bonos
    		<a href="{{ action('HumanResources\BondController@create') }}" class="btn btn-primary btn-rrhh pull-right">
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
	          	@foreach($bonds as $bond)
	        		<tr>
	        			<td>{{ $bond->code() }}</td>
	        			<td>{{ $bond->employee->name }}</td>
	        			<td>{{ $bond->type ? $bond->employee->name : '' }}</td>
	        			<td>{{ $bond->date->format('d/m/Y') }}</td>
	        			<td>{{ $bond->ammount }}</td>
	        			<td>
	        				<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\BondController@edit', [$bond->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\BondController@view', [$bond->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection