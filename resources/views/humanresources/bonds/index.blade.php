@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\BondController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">
    	<h5 class="deep-purple-text center-align">Bonos</h5>

    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Tipo</th>
	              	<th>Fecha</th>
	              	<th>Monto</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($bonds as $bond)
	        		<tr>
	        			<td>{{ $bond->code() }}</td>
	        			<td>{{ $bond->employee->name }}</td>
	        			<td>{{ $bond->type ? $bond->employee->name : '' }}</td>
	        			<td>{{ $bond->date->format('d/m/Y') }}</td>
	        			<td>{{ $bond->ammount }}</td>
	        			<td>
		              		<a href="{{ action('HumanResources\Pdf\BondController@view', [$bond->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection