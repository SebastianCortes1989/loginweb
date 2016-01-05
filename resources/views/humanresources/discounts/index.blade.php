@extends('default')

@section('content')

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href="{{ action('HumanResources\DiscountController@create') }}" class="btn-floating btn-large purple darken-1">
    	<i class="large material-icons">add</i>
    </a>				    
</div>

@include('humanresources.menu')

<div class="row">
	<div class="col s12 m12">	    	
    	<h5 class="deep-purple-text center-align">Descuentos</h5>
    	
    	<table>
	        <thead>
	          	<tr>
	          		<th>Código</th>
	              	<th>Trabajador</th>
	              	<th>Tipo</th>
	              	<th>Coutas</th>
	              	<th>Valor Total</th>
					<th>Estado</th>
					<th></th>	              	
	          	</tr>
	        </thead>

	        <tbody>
	          	@foreach($discounts as $discount)
	          		<tr>
	          			<th>{{ $discount->code() }}</th>
		              	<th>{{ $discount->employee->name }}</th>
		              	<th></th>
		              	<th>{{ $discount->quotas }}</th>
		              	<th>{{ $discount->ammount }}</th>
						<th></th>
						<td>
		              		<a href="{{ action('HumanResources\Pdf\DiscountController@view', [$discount->id]) }}">Ver PDF</a>
		              	</td>
	          		</tr>
	          	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection