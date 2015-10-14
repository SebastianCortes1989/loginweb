<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    /**
     *listar clientes
     *
     *return Response
    */
    public function index()
    {
        return view('admin.clients.index');
    }

    /**
     *crear cliente
     *
     *return Response
    */
    public function create()
    {
    	return view('admin.clients.create');
    }

    /**
     *editar cliente
     *
     *return Response
    */
    public function edit($clientId)
    {
    	return view('admin.clientes.edit');
    }
}
