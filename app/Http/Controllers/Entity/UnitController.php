<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     *listar unidades por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('entity.units.index');
    }

    /**
     *crear unidad
	 *
	 *return Response
    */
    public function create()
    {
        return view('entity.units.create');
    }

    /**
     *editar unidad
	 *
	 *return Response
    */
    public function edit($unitId)
    {
        return view('entity.units.edit');
    }
}
