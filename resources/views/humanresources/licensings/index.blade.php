@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\LicensingController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Licencias Médicas</h5>
    	<hr>
    	
    	<table>
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
		          		<td></td>
		              	<td>{{ $licensing->employee->name }}</td>
		              	<td>{{ $licensing->start_date }}</td>
		              	<td>{{ $licensing->end_date }}</td>
		              	<td></td>
		              	<td>{{ $licensing->number }}</td>
						<td></td>
						<td>
		              		<a href="{{ action('HumanResources\Pdf\LicensingController@view', [$licensing->id]) }}">Ver PDF</a>
		              	</td>
		          	</tr>
	        	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection