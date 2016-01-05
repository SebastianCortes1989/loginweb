@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\BonuController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">
    	<h5 class="deep-purple-text center-align">Aguinaldos</h5>
    	
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
	        	@foreach($bonus as $bonu)
	        		<tr>
	        			<td>{{ $bonu->code() }}</td>
	        			<td>{{ $bonu->employee->name }}</td>
	        			<td>{{ $bonu->type ? $bonu->type->name : '' }}</td>
	        			<td>{{ $bonu->date->format('d/m/Y') }}</td>
	        			<td>{{ $bonu->ammount }}</td>
	        			<td>
		              		<a href="{{ action('HumanResources\Pdf\BonuController@view', [$bonu->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection