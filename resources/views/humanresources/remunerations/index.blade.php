@extends('default')

@section('content')

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Remuneraciones</h5>    	    	  
	</div>
</div>

<table>
	<thead>
		<tr>
			<th>Trabajador</th>
			<th>Estado</th>
			<th>Sueldo Base</th>
			<th>Días No Trabajados</th>
			<th>Minutos No Trabajados</th>
			<th>Comisiones</th>
			<th>Bonos</th>
			<th>Horas Extras</th>
			<th>Asignación Familiar</th>
			<th>Colación</th>
			<th>Movilización</th>
			<th>Herramientas</th>
			<th>Viáticos</th>
			<th>Total Haberes</th>
			<th>Otros Descuentos</th>
			<th>Aguinaldos</th>
			<th>P. Personales</th>
			<th>P. CCAF</th>
			<th>APV</th>
			<th>Anticipos</th>
			<th>Sueldo Liquido</th>
		</tr>
	</thead>

	<tbody>
		@foreach($contracts as $contract)
			<tr>
				<td>{{ $contract->employee ? $contract->employee->name : '' }}</td>
				<td></td>
				<td>{{ $contract->base }}</td>
				<td></td>
				<td></td>
				<td>{{ $contract->totalCommissions() }}</td>
				<td>{{ $contract->totalBonds() }}</td>
				<td>{{ $contract->totalExtraHours() }}</td>
				<td></td>
				<td>{{ $contract->collation }}</td>
				<td>{{ $contract->mobilization }}</td>
				<td>{{ $contract->totalTools() }}</td>
				<td>{{ $contract->totalViaticals() }}</td>
				<td></td>
				<td>{{ $contract->totalDiscounts() }}</td>
				<td>{{ $contract->totalBonus() }}</td>
				<td></td>
				<td></td>
				<td>{{ $contract->totalSavings() }}</td>
				<td>{{ $contract->totalAdvances() }}</td>
				<td></td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection