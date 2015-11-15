<br>
<div class="row">
	<div class="col s12 m12">
		<nav class="purple darken-1">
	    	<div class="nav-wrapper">	    		
	      		<ul id="nav-mobile" class="left hide-on-med-and-down">
	        		<li><a href="{{ action('HumanResources\ContractController@index') }}">Contratos</a></li>
					<li>
			            <a class='dropdown-button' href='#' data-activates='haberes'>Haberes <i class="material-icons right">arrow_drop_down</i></a>

			        	<ul id='haberes' class='dropdown-content'>
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

		        	<li><a href="#">Descuentos</a></li>
		        	<li><a href="#">Préstamos</a></li>
		        	<li><a href="#">Terminos de Contrato</a></li>
		        	<li><a href="#">Certificados</a></li>
		        	<li><a href="#">Remuneraciones</a></li>
	    	  	</ul>
	    	</div>
		</nav>
	</div>
</div>