<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;

class AdvanceController extends Controller
{
    /**
     *listar anticipos por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('humanresources.advances.index');
    }

    /**
     *crear anticipo
	 *
	 *return Response
    */
    public function create()
    {
        return view('humanresources.advances.create');
    }

    /**
     *editar anticipo
	 *
	 *return Response
    */
    public function edit($advanceId)
    {
        return view('humanresources.advances.edit');
    }
}
