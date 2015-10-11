<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /*
     *crud
    */

    public function index()
    {
        return view('admin.clients.index');
    }

    public function create()
    {
    	return view('admin.clients.create');
    }
}
