<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /*
     *mantenedor de clientes
    */

    public function index()
    {
        return view('admin.clients.index');
    }

    public function create()
    {
    	return view('admin.clients.create');
    }

    public function edit($clientId)
    {
    	return view('admin.clientes.edit');
    }
}
