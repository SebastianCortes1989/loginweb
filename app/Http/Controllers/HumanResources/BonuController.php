<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;

class BonuController extends Controller
{
    /**
     *listar aguinaldos por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('humanresources.bonus.index');
    }

    /**
     *crear aguinaldo
	 *
	 *return Response
    */
    public function create()
    {
        return view('humanresources.bonus.create');
    }

    /**
     *editar aguinaldo
	 *
	 *return Response
    */
    public function edit($bonusId)
    {
        return view('humanresources.bonus.edit');
    }
}
