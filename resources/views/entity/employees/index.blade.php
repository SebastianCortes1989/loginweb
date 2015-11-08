@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('Entity\EmployeeController@create') }}" class="btn-floating btn-large amber darken-2">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('entity.menu')

<div class="row">
	<div class="col s12 m12">
    	<h5 class="amber-text center-align">Administración de Trabajadores</h5>
    	<hr>

    	<table>
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