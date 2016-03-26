<nav class="navbar navbar-default menu-rrhh">
  	<div class="container-fluid">    

	    <ul class="nav navbar-nav nav-rrhh">
       		<li><a href="{{ action('HumanResources\ContractController@index') }}">Contratos</a></li>	      	
	      	<li>
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          		Haberes <span class="caret"></span>
	        	</a>

	        	<ul class="dropdown-menu">
	            	<li><a href="{{ action('HumanResources\BonuController@index') }}">Aguinaldos</a></li>
	              	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\BondController@index') }}">Bonos</a></li>
	              	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\ToolController@index') }}">Desg. Herramientas</a></li>
	              	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\CommissionController@index') }}">Comisiones</a></li>
	              	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\ExtraHourController@index') }}">Horas Extras</a></li>
	              	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\ViaticalController@index') }}">Viaticos</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          		Descuentos <span class="caret"></span>
	        	</a>

	        	<ul class="dropdown-menu">
	            	<li><a href="{{ action('HumanResources\AdvanceController@index') }}">Anticipos</a></li>
	              	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\ApvController@index') }}">Ahorro APV</a></li>
	              	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\DiscountController@index') }}">Descuentos</a></li>
	              	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\LicensingController@index') }}">Licencias Medicas</a></li>
	            	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\PermissionController@index') }}">Permisos</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          		Préstamos <span class="caret"></span>
	        	</a>

	        	<ul class="dropdown-menu">
	            	<li><a href="{{ action('HumanResources\LoanController@index') }}">Personales</a></li>
	              	<li class="divider"></li>
	            	<li><a href="{{ action('HumanResources\CcafController@index') }}">CCAF</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          		Términos de Contrato <span class="caret"></span>
	        	</a>

	        	<ul class="dropdown-menu">
	            	<li><a href="{{ action('HumanResources\LetterController@index') }}">Cartas de Aviso</a></li>
			        <li class="divider"></li>
			        <li><a href="{{ action('HumanResources\SettlementController@index') }}">Finiquitos</a></li>
	            </ul>
	        </li>
	        <li>
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          		Certificados <span class="caret"></span>
	        	</a>

	        	<ul class="dropdown-menu">
	            	<li><a href="{{ action('HumanResources\AntiqueController@index') }}">Antiguedad</a></li>
			       	<li class="divider"></li>
			       	<li><a href="{{ action('HumanResources\TransferController@index') }}">Traslados</a></li>
	            </ul>
	        </li>
           	<li><a href="{{ action('HumanResources\RemunerationController@index') }}">Remuneraciones</a></li>
	    </ul>

	</div>
</nav>
