<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;

class LicensingController extends Controller
{
    /**
     *listar licencias por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('humanresources.licensings.index');
    }

    /**
     *crear licencia
	 *
	 *return Response
    */
    public function create()
    {
        return view('humanresources.licensings.create');
    }

    /**
     *editar licencia
	 *
	 *return Response
    */
    public function edit($licensingId)
    {
        return view('humanresources.licensings.edit');
    }
}
