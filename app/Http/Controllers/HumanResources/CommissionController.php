<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Commission;

use App\Http\Requests\HumanResources\CommissionFormRequest;

class CommissionController extends Controller
{
    protected $commission;

    public function __construct(Commission $commission){
        $this->commission = $commission;
    }

    /**
     *listar comisiones por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        $commissions = $this->commission->orderBy('date')->get();

        return view('humanresources.commissions.index', compact('commissions'));
    }

    /**
     *crear comision
	 *
	 *return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.commissions.create', compact('clients', 'employees'));
    }

    /**
     *registrar comision
     *
     *return Response
    */
    public function store(CommissionFormRequest $request){
        $data = $request->except('_token');

        $commission = $this->commission->create($data);

        return redirect()->action('HumanResources\CommissionController@index');
    }

    /**
     *editar comision
	 *
	 *return Response
    */
    public function edit($commissionId)
    {
        return view('humanresources.commissions.edit');
    }
}
