@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\AdvanceController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Anticipos</h5>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Tipo</th>
	              	<th>Fecha</th>
	              	<th>Monto</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	        	@foreach($advances as $advance)
	        		<tr>
	        			<td>{{ $advance->code() }}</td>
	        			<td>{{ $advance->employee->name }}</td>
	        			<td>{{ $advance->type ? $advance->type->name : '' }}</td>
	        			<td>{{ $advance->date->format('d/m/Y') }}</td>
	        			<td>{{ $advance->ammount }}</td>
	        			<td>
			              <a class="waves-effect waves-light btn purple" href="{{ action('HumanResources\AdvanceController@edit', [$advance->id]) }}">Editar</a>
			              <a class="waves-effect waves-light btn purple" href="{{ action('HumanResources\Pdf\AdvanceController@view', [$advance->id]) }}">Ver PDF</a>
	        			</td>
	        		</tr>
	        	@endforeach		       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection