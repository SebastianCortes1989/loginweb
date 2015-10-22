<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Region;
use App\Models\Admin\City;
use App\Models\Admin\Commune;
use App\Models\Admin\Compensacion;
use App\Models\Admin\Complementary;
use App\Models\Admin\Insurance;

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
        $regions = Region::lists('name', 'id');
        $cities = City::lists('name', 'id');
        $communes = Commune::lists('name', 'id');
        $compensacions = Compensacion::lists('name', 'id');
        $complementaries = Complementary::lists('name', 'id');
        $insurances = Insurance::lists('name', 'id');

    	return view('admin.clients.create', compact('regions', 'cities', 'communes', 'compensacions', 'complementaries', 'insurances'));
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
