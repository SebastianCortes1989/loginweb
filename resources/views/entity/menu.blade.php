<br>
<div class="row">
	<div class="col s12 m12">
		<nav class="amber darken-1">
	    	<div class="nav-wrapper">	    		
	      		<ul id="nav-mobile" class="left hide-on-med-and-down">
	        		<li><a href="{{ action('Entity\EmployeeController@index') }}">Trabajadores</a></li>
		        	<li><a href="{{ action('Entity\ChargeController@index') }}">Cargos</a></li>
		        	<li><a href="{{ action('Entity\BranchController@index') }}">Sucursales</a></li>
		        	<li><a href="{{ action('Entity\ManagementController@index') }}">Gerencias</a></li>
		        	<li><a href="{{ action('Entity\UnitController@index') }}">Unidades</a></li>
	    	  	</ul>
	    	</div>
		</nav>
	</div>
</div>