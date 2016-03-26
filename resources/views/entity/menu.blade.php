<nav class="navbar navbar-default menu-entidades">
  	<div class="container-fluid">    

	    <ul class="nav navbar-nav nav-entidades">
	    	<li><a href="{{ action('Entity\EmployeeController@index') }}">Trabajadores</a></li>
        	<li><a href="{{ action('Entity\ChargeController@index') }}">Cargos</a></li>
        	<li><a href="{{ action('Entity\BranchController@index') }}">Sucursales</a></li>
        	<li><a href="{{ action('Entity\ManagementController@index') }}">Gerencias</a></li>
        	<li><a href="{{ action('Entity\UnitController@index') }}">Unidades</a></li>
	    </ul>
	</div>
</nav>
