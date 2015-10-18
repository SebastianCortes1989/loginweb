<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    /**
     *listar descuentos por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('humanresources.discounts.index');
    }

    /**
     *crear descuento
	 *
	 *return Response
    */
    public function create()
    {
        return view('humanresources.discounts.create');
    }

    /**
     *editar descuento
	 *
	 *return Response
    */
    public function edit($discutionId)
    {
        return view('humanresources.discounts.edit');
    }
}
