@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\ExtraHourController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Horas Extras</h5>
    	<hr>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Porcentaje</th>
	              	<th>Fecha de Inicio</th>
	              	<th>Fecha de Término</th>
	              	<th>Horas</th>
	              	<th>Minutos</th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($extraHours as $extraHour)
	        		<tr>
	        			<td></td>
	        			<td>{{ $extraHour->employee->name }}</td>
	        			<td></td>
	        			<td>{{ $extraHour->start_date }}</td>
	        			<td>{{ $extraHour->end_date }}</td>
	        			<td></td>
	        			<td></td>
	        		</tr>
	        	@endforeach  	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection