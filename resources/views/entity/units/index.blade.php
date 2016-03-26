@extends('default')

@section('content')


@include('entity.menu')

<div class="row">
	<div class="col-md-12">	    	

    	<h5 class="text-center">
    		Administración de Unidades
    		<a href="{{ action('Entity\UnitController@create') }}" class="btn btn-primary btn-entidades pull-right">
    			Nueva
    		</a>
    	</h5>
    	<br>

    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	              	<th>Gerencia</th>
	              	<th>Nombre</th>
	              	<th>Responsable</th>
	          	</tr>
	        </thead>

	        <tbody>
	         	@foreach($units as $unit)
	         		<tr>
	         			<td>{{ $unit->management ? $unit->management->name : '' }}</td>
	         			<td>{{ $unit->name }}</td>
	         			<td>{{ $unit->employee ? $unit->employee->name : '' }}</td>
	         		</tr>
	         	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection