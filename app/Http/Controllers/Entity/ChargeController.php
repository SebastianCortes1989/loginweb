<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;

class ChargeController extends Controller
{
    /**
     *listar cargos por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('entity.charges.index');
    }

    /**
     *crear cargo
	 *
	 *return Response
    */
    public function create()
    {
        return view('entity.charges.create');
    }

    /**
     *editar cargo
	 *
	 *return Response
    */
    public function edit($chargeId)
    {
        return view('entity.charges.edit');
    }
}
