@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Ahorro APV
    		<a href="{{ action('HumanResources\ApvController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>
    	
    	<table class="table table-bordered">
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Periodo</th>
	              	<th>Monto</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($savings as $saving)
	          		<tr>
		          		<td>{{ $saving->code() }}</td>
		              	<td>{{ $saving->employee->name }}</td>
		              	<td></td>
		              	<td>{{ $saving->ammount }}</td>
		              	<td>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\ApvController@edit', [$saving->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\ApvController@view', [$saving->id]) }}">Ver PDF</a>
		              	</td>
		          	</tr>
	          	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection