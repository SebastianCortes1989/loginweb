@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Licencias Médicas
    		<a href="{{ action('HumanResources\LicensingController@create') }}" class="btn btn-primary btn-rrhh pull-right">
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
	              	<th>Días</th>
	              	<th>N° Licencia</th>
					<th>Accidente de Trabajo</th>
					<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($licensings as $licensing)
					<tr>
		          		<td>{{ $licensing->code() }}</td>
		              	<td>{{ $licensing->employee->name }}</td>
		              	<td>{{ $licensing->start_date->format('d/m/Y') }}</td>
		              	<td>{{ $licensing->end_date->format('d/m/Y') }}</td>
		              	<td>{{ $licensing->days }}</td>
		              	<td>{{ $licensing->number }}</td>
						<td></td>
						<td>
							<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\LicensingController@edit', [$licensing->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\LicensingController@view', [$licensing->id]) }}">Ver PDF</a>
		              	</td>
		          	</tr>
	        	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection