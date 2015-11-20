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
    	<hr>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Periodo</th>
	              	<th>Monto</th>
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($savings as $saving)
	          		<tr>
		          		<th></th>
		              	<th>{{ $saving->employee->name }}</th>
		              	<th></th>
		              	<th>{{ $saving->ammount }}</th>
		          	</tr>
	          	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection