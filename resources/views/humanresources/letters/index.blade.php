@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\LetterController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Cartas</h5>
    	<hr>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Contrato</th>
	              	<th>Fecha de Aviso</th>
	              	<th>Fecha de Finiquitacion</th>
	              	<th>Scan Inspeccion</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($letters as $letter)
	        		<tr>
	        			<td>{{ $letter->code() }}</td>
	        			<td>{{ $letter->employee->name }}</td>
	        			<td>{{ $letter->contract->code() }}</td>
	        			<td>{{ $letter->notice_date->format('d/m/Y') }}</td>
	        			<td>{{ $letter->settlement_date->format('d/m/Y') }}</td>
	        			<td></td>
	        			<td>
		              		<a href="{{ action('HumanResources\Pdf\LetterController@view', [$letter->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach  	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection