@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Anticipos
    		<a href="{{ action('HumanResources\AdvanceController@create') }}" class="btn btn-primary btn-rrhh pull-right">
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
	        	@foreach($advances as $advance)
	        		<tr>
	        			<td>{{ $advance->code() }}</td>
	        			<td>{{ $advance->employee->name }}</td>
	        			<td>{{ $advance->type ? $advance->type->name : '' }}</td>
	        			<td>{{ $advance->date->format('d/m/Y') }}</td>
	        			<td>{{ $advance->ammount }}</td>
	        			<td>
			              	<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\AdvanceController@edit', [$advance->id]) }}">Editar</a>
			              	<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\AdvanceController@view', [$advance->id]) }}">Ver PDF</a>
							<a class="btn btn-xs btn-rrhh btn-primary" href="#dlgDelete" data-delete="{{ $advance->id }}">Eliminar</a>
	        			</td>
	        		</tr>
	        	@endforeach		       
	        </tbody>
	    </table>
	</div>
</div>

@include('humanresources.advances.modal')

@endsection