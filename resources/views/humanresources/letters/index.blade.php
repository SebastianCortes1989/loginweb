@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Cartas
    		<a href="{{ action('HumanResources\LetterController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>
    	
    	<table class="table table-bordered">
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
	        			<td>{{ $letter->contract ? $letter->contract->code() : '' }}</td>
	        			<td>{{ $letter->notice_date->format('d/m/Y') }}</td>
	        			<td>{{ $letter->settlement_date->format('d/m/Y') }}</td>
	        			<td></td>
	        			<td>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\LetterController@edit', [$letter->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\LetterController@view', [$letter->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach  	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection