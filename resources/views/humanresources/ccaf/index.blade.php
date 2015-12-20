@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\CcafController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Préstamos CCAF</h5>
    	<hr>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Cuotas</th>
	              	<th>Monto</th>
	              	<th>Caja de Compensación</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($ccaf as $loan)
	        		<tr>
	        			<td></td>
	        			<td>{{ $loan->employee->name }}</td>
	        			<td>{{ $loan->quotas }}</td>
	        			<td>{{ $loan->ammount }}</td>
	        			<td></td>
	        			<td>
		              		<a href="{{ action('HumanResources\Pdf\CcafController@view', [$loan->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach		       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection