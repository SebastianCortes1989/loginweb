@extends('default')

@section('content')

<div class="row">
	<div class="col-md-12">	    	

    	<h5 class="text-center">
    		Administración de Clientes
    		<a href="{{ action('Admin\ClientController@create') }}" class="btn btn-primary pull-right">
    			Nuevo
    		</a>
    	</h5>
    	<br>

    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	              	<th data-field="id">Nombre</th>
	              	<th data-field="name">R.U.T</th>
	              	<th data-field="price">E-mail</th>
	              	<th data-field="price">Teléfono</th>
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($clients as $client)

	        		<tr>
	        			<td>{{ $client->name }}</td>
	        			<td>{{ $client->rut }}</td>
	        			<td>{{ $client->email }}</td>
	        			<td>{{ $client->phone }}</td>
	        		</tr>

	        	@endforeach	       
	        </tbody>
	    </table>	    
	</div>
</div>

@endsection