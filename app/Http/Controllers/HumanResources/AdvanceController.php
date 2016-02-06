<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\AdvanceType;

use App\Models\HumanResources\Advance;

use App\Http\Requests\HumanResources\AdvanceFormRequest;
use App\Http\Requests\HumanResources\AdvanceEditFormRequest;

class AdvanceController extends Controller
{
    protected $advance;
    protected $employee;

    public function __construct(Advance $advance, Employee $employee)
    {
        $this->advance = $advance;
        $this->employee = $employee;
    }

    /**
     * listar anticipos por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $advances = $this->advance->whereClientId(Auth::user()->client_id)->get();
        
        return view('humanresources.advances.index', compact('advances'));
    }

    /**
     * crear anticipo
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();
        $advancesTypes = AdvanceType::orderBy('name')->lists('name', 'id');

        return view('humanresources.advances.create', compact('employees', 'advancesTypes'));
    }

    /**
     * editar anticipo
	 *
	 * @return Response
    */
    public function edit($advanceId)
    {
        $advance = $this->advance->findOrFail($advanceId);

        $employees = $this->employee->getCmb();
        $advancesTypes = AdvanceType::orderBy('name')->lists('name', 'id');

        return view('humanresources.advances.edit', compact('advance', 'employees', 'advancesTypes'));
    }

    /**
     * registrar anticipo
     *
     * @return Response
    */
    public function store(AdvanceFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $advance = $this->advance->create($data);

        return redirect()->action('HumanResources\AdvanceController@index');
    }

    /**
     * modificar anticipo
     *
     * @return Response
    */
    public function update(AdvanceEditFormRequest $request)
    {
        $data = $request->except('_token');

        $advance = $this->advance->findOrFail($data['advance_id']);
        $advance = $advance->update($data);

        return redirect()->action('HumanResources\AdvanceController@index');
    }
}
