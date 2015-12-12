<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Branch;

use App\Http\Requests\Entity\BranchFormRequest;

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
    public function index()
    {
        $branchs = $this->branch->whereClientId(Auth::user()->client_id)->orderBy('name')->get();

        return view('entity.branchs.index', compact('branchs'));
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

    /*
     * registrar sucursal
     *
     * return Response
    */
    public function store(BranchFormRequest $request){
        $data = $request->except('_token');

        $branch = $this->branch->create($data);

        return redirect()->action('Entity\BranchController@index');
    }
}
