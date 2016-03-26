@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">
    	<h5 class="text-center">
    		Permisos
    		<a href="{{ action('HumanResources\PermissionController@create') }}" class="btn btn-primary btn-rrhh pull-right">
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
	              	<th>Fecha Inicio</th>
	              	<th>Fecha de Término</th>
	              	<th>Días de Permiso</th>
	              	<th>Días Habiles</th>
	              	<th>Monto</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($permissions as $permission)
	        		<tr>
		          		<td>{{ $permission->code() }}</td>
		              	<td>{{ $permission->employee->name }}</td>
		              	<td>{{ $permission->type ? $permission->type->name : '' }}</td>
		              	<td>{{ $permission->start_date->format('d/m/Y') }}</td>
		              	<td>{{ $permission->end_date->format('d/m/Y') }}</td>
		              	<td>{{ $permission->days }}</td>
		              	<td></td>
		              	<td></td>
		              	<td>
							<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\PermissionController@edit', [$permission->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\PermissionController@view', [$permission->id]) }}">Ver PDF</a>
		              	</td>
		          	</tr>
	        	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection