@extends('default')

@section('content')

@include('entity.menu')

<div class="row">
	<div class="col-md-12">

    	<h5 class="text-center">
    		Administración de Trabajadores
    		<a href="{{ action('Entity\EmployeeController@create') }}" class="btn btn-primary btn-entidades pull-right">
    			Nuevo
    		</a>
    	</h5>
    	<br>

    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	              	<th>Nombre</th>
	              	<th>R.U.T</th>
	              	<th>AFP</th>
	              	<th>Salud</th>
	              	<th>Nacionalidad</th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($employees as $employee)
	          		<tr>
	          			<td>{{ $employee->name }}</td>
	          			<td>{{ $employee->rut }}</td>
	          			<td>{{ $employee->afp ? $employee->afp->name : '' }}</td>
	          			<td>{{ $employee->health ? $employee->health->name : '' }}</td>
	          			<td>{{ $employee->nacionality ? $employee->nacionality->name : '' }}</td>
	          		</tr>
	          	@endforeach
	        </tbody>
	    </table>	
    		    
	</div>
</div>

@endsection