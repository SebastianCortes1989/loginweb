<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;

class BondController extends Controller
{
    /**
     *listar bonos por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('humanresources.bonds.index');
    }

    /**
     *crear bono
	 *
	 *return Response
    */
    public function create()
    {
        return view('humanresources.bonds.create');
    }

    /**
     *editar bono
	 *
	 *return Response
    */
    public function edit($bondId)
    {
        return view('humanresources.bonds.edit');
    }
}
