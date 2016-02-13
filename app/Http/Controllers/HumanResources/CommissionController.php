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
use App\Http\Requests\HumanResources\CommissionEditFormRequest;

class CommissionController extends Controller
{
    protected $commission;
    protected $employee;

    public function __construct(Commission $commission, Employee $employee)
    {
        $this->commission = $commission;
        $this->employee = $employee;
        
        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
    }

    /**
     * listar comisiones por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $commissions = $this->commission->whereClientId(Auth::user()->client_id)->orderBy('date')->get();

        return view('humanresources.commissions.index', compact('commissions'));
    }

    /**
     * crear comision
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();
        $commissionsTypes = CommissionType::orderBy('name')->lists('name', 'id');

        return view('humanresources.commissions.create', compact('employees', 'commissionsTypes'));
    }

    /**
     * registrar comision
     *
     * @return Response
    */
    public function store(CommissionFormRequest $request){
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $commission = $this->commission->create($data);

        return redirect()->action('HumanResources\CommissionController@index');
    }

    /**
     * editar comision
	 *
	 * @return Response
    */
    public function edit($commissionId)
    {
        $commission = $this->commission->findOrFail($commissionId);
        
        $employees = $this->employee->getCmb();
        $commissionsTypes = CommissionType::orderBy('name')->lists('name', 'id');

        return view('humanresources.commissions.edit', compact('commission', 'employees', 'commissionsTypes'));
    }

    /**
     * registrar comision
     *
     * @return Response
    */
    public function update(CommissionEditFormRequest $request){
        $data = $request->except('_token');
        
        $commission = $this->commission->findOrFail($data['commission_id']);
        $commission = $commission->update($data);

        return redirect()->action('HumanResources\CommissionController@index');
    }
}
