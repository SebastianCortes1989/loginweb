@extends('default')

@section('content')

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Remuneraciones</h5>    	    	  
	</div>
</div>

<div style="overflow:scroll; font-size:12px">

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
				<th>Gratificación</th>
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
					<td>{{ $contract->totalNotWorkedDays($month, $year) }}</td>
					<td></td>
					<td>{{ $contract->totalCommissions($month, $year) }}</td>
					<td>{{ $contract->totalBonds($month, $year) }}</td>
					<td>{{ $contract->totalExtraHours($month, $year) }}</td>
					<td>{{ $contract->gratification($month, $year) }}</td>
					<td>{{ $contract->family() }}</td>
					<td>{{ $contract->collation }}</td>
					<td>{{ $contract->mobilization }}</td>
					<td>{{ $contract->totalTools($month, $year) }}</td>
					<td>{{ $contract->totalViaticals($month, $year) }}</td>
					<td>{{ $contract->totalAssets($month, $year) }}</td>
					<td>{{ $contract->totalDiscounts($month, $year) }}</td>
					<td>{{ $contract->totalBonus($month, $year) }}</td>
					<td>{{ $contract->totalLoanQuotas($month, $year) }}</td>
					<td>{{ $contract->totalCcafQuotas($month, $year) }}</td>
					<td>{{ $contract->totalSavings($month, $year) }}</td>
					<td>{{ $contract->totalAdvances($month, $year) }}</td>
					<td>{{ $contract->totalLiquid($month, $year) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>	

</div>

@endsection