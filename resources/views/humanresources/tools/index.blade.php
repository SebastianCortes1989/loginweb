@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Desgaste de Herramientas
    		<a href="{{ action('HumanResources\ToolController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Fecha</th>
	              	<th>Monto</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($tools as $tool)
	        		<tr>
	        			<td>{{ $tool->code() }}</td>
	        			<td>{{ $tool->employee->name }}</td>
	        			<td>{{ $tool->date->format('d/m/Y') }}</td>
	        			<td>{{ $tool->ammount }}</td>
	        			<td>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\ToolController@edit', [$tool->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\ToolController@view', [$tool->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection