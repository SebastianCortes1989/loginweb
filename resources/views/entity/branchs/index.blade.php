@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('Entity\BranchController@create') }}" class="btn-floating btn-large amber darken-2">
    	<i class="large material-icons">add</i>
    </a>				    
</div>


@include('entity.menu')

<div class="row">
	<div class="col s12 m12">
    	<h5 class="amber-text center-align">Administración de Sucursales</h5>
    	<hr>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Nombre</th>
	              	<th>Dirección</th>
	          	</tr>
	        </thead>

	        <tbody>
	          		       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection