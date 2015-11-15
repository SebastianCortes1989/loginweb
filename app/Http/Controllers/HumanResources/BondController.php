<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Bond;

class BondController extends Controller
{
    protected $bond;

    public function __construct(Bond $bond){
        $this->bond = $bond;
    }

    /**
     *listar bonos por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        $bonds = $this->bond->orderBy('date')->get();

        return view('humanresources.bonds.index', compact('bonds'));
    }

    /**
     *crear bono
	 *
	 *return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.bonds.create', compact('clients', 'employees'));
    }

    /**
     *registrar bono
     *
     *return Response
    */
    public function store(Request $request){
        $data = $request->except('_token');

        $bond = $this->bond->create($data);

        return redirect()->action('HumanResources\BondController@index');
    }

    /**
     *editar bono
	 *
	 *return Response
    */
    public function edit($bondId)
    {
        return view('humanresources.bonds.edit');
    }
}
