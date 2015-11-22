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

		        	<li>
		        		<a class='dropdown-button' href='#' data-activates='descuentos'>Descuentos <i class="material-icons right">arrow_drop_down</i></a>

			        	<ul id='descuentos' class='dropdown-content'>
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
		        		<a class='dropdown-button' href='#' data-activates='prestamos'>Préstamos <i class="material-icons right">arrow_drop_down</i></a>

			        	<ul id='prestamos' class='dropdown-content'>
			            	<li><a href="{{ action('HumanResources\LoanController@index') }}">Personales</a></li>
			              	<li class="divider"></li>
			            	<li><a href="{{ action('HumanResources\CcafController@index') }}">CCAF</a></li>
			            </ul>
		        	</li>

		        	<li>
		        		<a class='dropdown-button' href='#' data-activates='termino'>Terminos de Contrato <i class="material-icons right">arrow_drop_down</i></a>

			        	<ul id='termino' class='dropdown-content'>
			            	<li><a href="{{ action('HumanResources\LetterController@index') }}">Cartas de Aviso</a></li>
			              	<li class="divider"></li>
			            	<li><a href="{{ action('HumanResources\SettlementController@index') }}">Finiquitos</a></li>
			            </ul>
		        	</li>

		        	<li>
		        		<a class='dropdown-button' href='#' data-activates='certificados'>Certificados <i class="material-icons right">arrow_drop_down</i></a>

			        	<ul id='certificados' class='dropdown-content'>
			            	<li><a href="{{ action('HumanResources\AntiqueController@index') }}">Antiguedad</a></li>
			              	<li class="divider"></li>
			            	<li><a href="{{ action('HumanResources\TransferController@index') }}">Traslados</a></li>			              	
			            </ul>
		        	</li>
		        	<li><a href="#">Remuneraciones</a></li>
	    	  	</ul>
	    	</div>
		</nav>
	</div>
</div>