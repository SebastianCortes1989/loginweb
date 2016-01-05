@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\ToolController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Desgaste de Herramientas</h5>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Fecha</th>
	              	<th>Monto</th>
	              	<th></th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($tools as $tool)
	        		<tr>
	        			<td>{{ $tool->code() }}</td>
	        			<td>{{ $tool->employee->name }}</td>
	        			<td>{{ $tool->date->format('d/m/Y') }}</td>
	        			<td>{{ $tool->ammount }}</td>
	        			<td>
		              		<a href="{{ action('HumanResources\Pdf\ToolController@view', [$tool->id]) }}">Ver PDF</a>
		              	</td>
	        		</tr>
	        	@endforeach       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection