@extends('default')

@section('content')


@include('entity.menu')

<div class="row">
	<div class="col-md-12">
		<h5 class="text-center">
    		Administración de Sucursales
    		<a href="{{ action('Entity\BranchController@create') }}" class="btn btn-primary btn-entidades pull-right">
    			Nueva
    		</a>
    	</h5>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Nombre</th>
	              	<th>Dirección</th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($branchs as $branch)
	          		<tr>
	          			<td>{{ $branch->name }}</td>
	          			<td>{{ $branch->address }}</td>
	          		</tr>
	          	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection