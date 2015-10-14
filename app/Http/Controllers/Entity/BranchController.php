<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    /**
     *listar sucursales por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('entity.branchs.index');
    }

    /**
     *crear sucursal
	 *
	 *return Response
    */
    public function create()
    {
        return view('entity.branchs.create');
    }

    /**
     *editar sucursal
	 *
	 *return Response
    */
    public function edit($branchId)
    {
        return view('entity.branchs.edit');
    }
}
