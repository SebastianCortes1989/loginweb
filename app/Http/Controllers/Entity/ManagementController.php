<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;

class ManagementController extends Controller
{
    /**
     *listar gerencias por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('entity.managements.index');
    }

    /**
     *crear gerencia
	 *
	 *return Response
    */
    public function create()
    {
        return view('entity.managements.create');
    }

    /**
     *editar gerencia
	 *
	 *return Response
    */
    public function edit($managementId)
    {
        return view('entity.managements.edit');
    }
}
