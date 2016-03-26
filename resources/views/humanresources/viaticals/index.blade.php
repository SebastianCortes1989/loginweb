@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Viáticos
    		<a href="{{ action('HumanResources\ViaticalController@create') }}" class="btn btn-primary btn-rrhh pull-right">
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
	          	@foreach($viaticals as $viatical)
	        		<tr>
	        			<td>{{ $viatical->code() }}</td>
	        			<td>{{ $viatical->employee->name }}</td>
	        			<td>{{ $viatical->type ? $viatical->type->name : '' }}</td>
	        			<td>{{ $viatical->date->format('d/m/Y') }}</td>
	        			<td>{{ $viatical->ammount }}</td>
	        			<td>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\ViaticalController@edit', [$viatical->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\ViaticalController@view', [$viatical->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach  	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection