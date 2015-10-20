@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('Entity\EmployeeController@create') }}" class="btn-floating btn-large amber darken-2">
    	<i class="large material-icons">add</i>
    </a>				    
</div>


<div class="row">
	<div class="col s12 m12">	    	
    	<div class="card-panel amber darken-2 white-text">
      		<span class="card-title">Administración de Trabajadores</span> 	      		      		
    	</div>

    	<div class="row">
		    <div class="col s12">
		      	<ul class="tabs">
			        <li class="tab col s3"><a href="#test1">Vigentes</a></li>
			        <li class="tab col s3"><a class="active" href="#test2">Finiquitados</a></li>
		      	</ul>
		    </div>

		    <div id="test1" class="col s12">
		    	
		    	<br><br>
		    	<table>
		    		<caption>Vigentes</caption>
			        <thead>
			          	<tr>
			              	<th>Nombre</th>
			              	<th>R.U.T</th>
			              	<th>AFP</th>
			              	<th>Salud</th>
			              	<th>Nacionalidad</th>
			          	</tr>
			        </thead>

			        <tbody>
			          		       
			        </tbody>
			    </table>

		    </div>

		    <div id="test2" class="col s12">
		    	
		    	<br><br>
		    	<table>
		    		<caption>Finiquitados</caption>
			        <thead>
			          	<tr>
			              	<th>Nombre</th>
			              	<th>R.U.T</th>
			              	<th>AFP</th>
			              	<th>Salud</th>
			              	<th>Nacionalidad</th>
			          	</tr>
			        </thead>

			        <tbody>
			          		       
			        </tbody>
			    </table>

		    </div>		    
		</div>

    		    
	</div>
</div>

@endsection