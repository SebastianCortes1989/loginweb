@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">
    	<h5 class="text-center">
    		Certificados de Antiguedad
    		<a href="{{ action('HumanResources\AntiqueController@create') }}" class="btn btn-primary btn-rrhh pull-right">
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
	              	<th></th>              	
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($antiques as $antique)
	        		<tr>
		          		<td>{{ $antique->code() }}</td>
		              	<td>{{ $antique->employee->name }}</td>
		              	<td>{{ $antique->date->format('d/m/Y') }}</td>
		              	<td>
		              		<a class="btn btn-primary btn-xs" href="{{ action('HumanResources\AntiqueController@edit', [$antique->id]) }}">Editar</a>
		              		<a class="btn btn-primary btn-xs" href="{{ action('HumanResources\Pdf\AntiqueController@view', [$antique->id]) }}">Ver PDF</a>
		              	</td>
		          	</tr>
	        	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection