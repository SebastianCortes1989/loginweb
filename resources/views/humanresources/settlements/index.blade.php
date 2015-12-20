@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\SettlementController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Finiquitos</h5>
    	<hr>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Causal</th>
	              	<th>Fecha</th>
	              	<th>Monto</th>
	              	<th>Carta</th>
	              	<th>Scan AFC</th>
	              	<th>Scan Previred</th>
	              	<th>Scan Finiquito</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($settlements as $settlement)
	        		<tr>
	        			<td></td>
	        			<td>{{ $settlement->employee->name }}</td>
	        			<td></td>
	        			<td>{{ $settlement->date }}</td>
	        			<td>{{ $settlement->ammount }}</td>
	        			<td></td>
	        			<td></td>
	        			<td></td>
	        			<td>
		              		<a href="{{ action('HumanResources\Pdf\SettlementController@view', [$settlement->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach  	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection