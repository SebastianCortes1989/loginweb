@extends('default')

@section('content')


@include('entity.menu')

<div class="row">
	<div class="col-md-12">
    	<h5 class="text-center">
    		Administración de Cargos
    		<a href="{{ action('Entity\ChargeController@create') }}" class="btn btn-primary btn-entidades pull-right">
    			Nuevo
    		</a>
    	</h5>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Nombre</th>
	              	<th>Gerencia</th>
	              	<th>Área</th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($charges as $charge)
	          		<tr>
	          			<td>{{ $charge->name }}</td>
	          			<td>{{ $charge->management ? $charge->management->name : '' }}</td>
	          			<td>{{ $charge->unit ? $charge->unit->name : '' }}</td>
	          		</tr>
	          	@endforeach	       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection