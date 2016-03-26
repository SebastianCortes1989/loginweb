@extends('default')

@section('content')

@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">
    	<h5 class="text-center">
    		Aguinaldos
    		<a href="{{ action('HumanResources\BonuController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>

    	<table class="table table-bordered">
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
		              		<a class="btn btn-primary btn-xs" href="{{ action('HumanResources\BonuController@edit', [$bonu->id]) }}">Editar</a>
		              		<a class="btn btn-primary btn-xs" href="{{ action('HumanResources\Pdf\BonuController@view', [$bonu->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection