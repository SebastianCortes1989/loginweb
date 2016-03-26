@extends('default')

@section('content')


@include('humanresources.menu')

<div class="row">
	<div class="col-md-12">	    	
    	<h5 class="text-center">
    		Descuentos
    		<a href="{{ action('HumanResources\DiscountController@create') }}" class="btn btn-primary btn-rrhh pull-right">
    			Nuevo
    		</a>
    	</h3>
    	<br>
    	
    	<table class="table table-bordered">
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
							<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\DiscountController@edit', [$discount->id]) }}">Editar</a>
		              		<a class="btn btn-xs btn-rrhh btn-primary" href="{{ action('HumanResources\Pdf\DiscountController@view', [$discount->id]) }}">Ver PDF</a>
		              	</td>
	          		</tr>
	          	@endforeach
	        </tbody>
	    </table>

    		    
	</div>
</div>

@endsection