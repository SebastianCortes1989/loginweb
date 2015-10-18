<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;

class ApvController extends Controller
{
    /**
     *listar ahorro apv por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        return view('humanresources.apv.index');
    }

    /**
     *crear ahorro apv
	 *
	 *return Response
    */
    public function create()
    {
        return view('humanresources.apv.create');
    }

    /**
     *editar ahorro apv
	 *
	 *return Response
    */
    public function edit($apvId)
    {
        return view('humanresources.apv.edit');
    }
}
