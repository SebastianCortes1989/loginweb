@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Horas Extras
    		<a href="{{ action('HumanResources\ExtraHourController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Porcentaje</th>
	              	<th>Fecha de Inicio</th>
	              	<th>Fecha de Término</th>
	              	<th>Horas</th>
	              	<th>Minutos</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($extraHours as $extraHour)
	        		<tr>
	        			<td>{{ $extraHour->code() }}</td>
	        			<td>{{ $extraHour->employee->name }}</td>
	        			<td>{{ $extraHour->percentaje }}</td>
	        			<td>{{ $extraHour->start_date->format('d/m/Y H:i') }}</td>
	        			<td>{{ $extraHour->end_date->format('d/m/Y H:i') }}</td>
	        			<td>{{ $extraHour->hours }}</td>
	        			<td>{{ $extraHour->minutes }}</td>
	        			<td>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\ExtraHourController@edit', [$extraHour->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\ExtraHourController@view', [$extraHour->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach  	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection