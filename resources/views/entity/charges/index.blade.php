@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('Entity\ChargeController@create') }}" class="btn-floating btn-large amber darken-2">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('entity.menu')

<div class="row">
	<div class="col s12 m12">
    	<h5 class="amber-text center-align">Administración de Cargos</h5>
    	<hr>
    	
    	<table>
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