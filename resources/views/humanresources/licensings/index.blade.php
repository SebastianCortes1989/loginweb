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
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($licensings as $licensing)
					<tr>
		          		<th></th>
		              	<th>{{ $licensing->employee->name }}</th>
		              	<th>{{ $licensing->start_date }}</th>
		              	<th>{{ $licensing->end_date }}</th>
		              	<th></th>
		              	<th>{{ $licensing->number }}</th>
						<th></th>
		          	</tr>	        		
	        	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection