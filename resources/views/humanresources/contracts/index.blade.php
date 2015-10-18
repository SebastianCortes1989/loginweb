@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\ContractController@create') }}" class="btn-floating btn-large amber darken-2">
    	<i class="large material-icons">add</i>
    </a>				    
</div>


<div class="row">
	<div class="col s12 m12">	    	
    	<div class="card-panel purple darken-1 white-text">
      		<span class="card-title">Administración de Contratos</span> 	      		      		
    	</div>

    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Tipo de Contrato</th>
	              	<th>Fecha de Inicio</th>
	              	<th>Fecha de Término</th>
	              	<th>Cargo</th>
	              	<th>Sueldo Base</th>
	              	<th>Sueldo Liquido</th>
	          	</tr>
	        </thead>

	        <tbody>
	          		       
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection