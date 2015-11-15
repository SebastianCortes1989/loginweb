@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\CommissionController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Comisiones</h5>
    	<hr>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Tipo</th>
	              	<th>Fecha</th>
	              	<th>Monto</th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($commissions as $commission)
	        		<tr>
	        			<td></td>
	        			<td>{{ $commission->employee->name }}</td>
	        			<td></td>
	        			<td>{{ $commission->date }}</td>
	        			<td>{{ $commission->ammount }}</td>
	        		</tr>
	        	@endforeach       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection