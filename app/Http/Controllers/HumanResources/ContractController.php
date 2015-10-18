<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    /**
     *listar contratos por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('humanresources.contracts.index');
    }

    /**
     *crear contrato
	 *
	 *return Response
    */
    public function create()
    {
        return view('humanresources.contracts.create');
    }

    /**
     *editar contrato
	 *
	 *return Response
    */
    public function edit($branchId)
    {
        return view('humanresources.contracts.edit');
    }
}
