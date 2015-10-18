<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;

class ComitionController extends Controller
{
    /**
     *listar comisiones por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('humanresources.comitions.index');
    }

    /**
     *crear comision
	 *
	 *return Response
    */
    public function create()
    {
        return view('humanresources.comitions.create');
    }

    /**
     *editar comision
	 *
	 *return Response
    */
    public function edit($comitionId)
    {
        return view('humanresources.comitions.edit');
    }
}
