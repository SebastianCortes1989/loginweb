@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\PermissionController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">
    	<h5 class="deep-purple-text center-align">Permisos</h5>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Tipo</th>
	              	<th>Fecha Inicio</th>
	              	<th>Fecha de Término</th>
	              	<th>Días de Permiso</th>
	              	<th>Días Habiles</th>
	              	<th>Horas de Permiso</th>
	              	<th>Tipo de Permiso</th>
	              	<th>Monto</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($permissions as $permission)
	        		<tr>
		          		<td></td>
		              	<td>{{ $permission->employee->name }}</td>
		              	<td></td>
		              	<td>{{ $permission->start_date->format('d/m/Y') }}</td>
		              	<td>{{ $permission->end_date->format('d/m/Y') }}</td>
		              	<td></td>
		              	<td></td>
		              	<td></td>
		              	<td></td>
		              	<td></td>
		              	<td>
		              		<a href="{{ action('HumanResources\Pdf\PermissionController@view', [$permission->id]) }}">Ver PDF</a>
		              	</td>
		          	</tr>
	        	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection