<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;

class ViaticumController extends Controller
{
    /**
     *listar viaticos por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('humanresources.viaticums.index');
    }

    /**
     *crear viatico
	 *
	 *return Response
    */
    public function create()
    {
        return view('humanresources.viaticums.create');
    }

    /**
     *editar viatico
	 *
	 *return Response
    */
    public function edit($viaticumId)
    {
        return view('humanresources.viaticums.edit');
    }
}
