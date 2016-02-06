@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\ApvController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Ahorro APV</h5>
    	
    	<table>
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
		              		<a class="waves-effect waves-light btn purple" href="{{ action('HumanResources\ApvController@edit', [$saving->id]) }}">Editar</a>
		              		<a class="waves-effect waves-light btn purple" href="{{ action('HumanResources\Pdf\ApvController@view', [$saving->id]) }}">Ver PDF</a>
		              	</td>
		          	</tr>
	          	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection