@extends('default')

@section('content')


@include('entity.menu')

<div class="row">
	<div class="col-md-12">
    	<h5 class="text-center">
    		Administración de Gerencias
    		<a href="{{ action('Entity\ManagementController@create') }}" class="btn btn-primary btn-entidades pull-right">
    			Nueva
    		</a>
    	</h5>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Nombre</th>
	              	<th>Responsable</th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($managements as $management)
	          		<tr>
	          			<td>{{ $management->name }}</td>
	          			<td>{{ $management->employee ? $management->employee->name : '' }}</td>
	          		</tr>
	          	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection