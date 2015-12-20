<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\CommissionType;

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
    public function index()
    {
        $commissions = $this->commission->whereClientId(Auth::user()->client_id)->orderBy('date')->get();

        return view('humanresources.commissions.index', compact('commissions'));
    }

    /**
     *crear comision
	 *
	 *return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        $commissionsTypes = CommissionType::orderBy('name')->lists('name', 'id');

        return view('humanresources.commissions.create', compact('employees', 'commissionsTypes'));
    }

    /**
     *registrar comision
     *
     *return Response
    */
    public function store(CommissionFormRequest $request){
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
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
