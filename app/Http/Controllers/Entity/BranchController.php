<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Branch;

class BranchController extends Controller
{
    protected $branch;

    public function __construct(Branch $branch)
    {
        $this->branch = $branch;
    }

    /**
     *listar sucursales por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        $branchs = $this->branch->orderBy('name')->get();

        return view('entity.branchs.index', compact('branchs'));
    }

    /**
     *crear sucursal
	 *
	 *return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');

        return view('entity.branchs.create', compact('clients'));
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

    /*
     * registrar sucursal
     *
     * return Response
    */
    public function store(Request $request){
        $data = $request->except('_token');

        $branch = $this->branch->create($data);

        return redirect()->action('Entity\BranchController@index');
    }
}
