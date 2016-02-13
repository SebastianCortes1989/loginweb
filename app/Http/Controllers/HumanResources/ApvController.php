<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\SavingType;

use App\Models\HumanResources\Saving;

use App\Http\Requests\HumanResources\ApvFormRequest;
use App\Http\Requests\HumanResources\ApvEditFormRequest;

class ApvController extends Controller
{
    protected $saving;
    protected $employee;

    public function __construct(Saving $saving, Employee $employee)
    {
        $this->saving = $saving;
        $this->employee = $employee;

        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
    }

    /**
     * listar ahorro apv por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $savings = $this->saving->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.apv.index', compact('savings'));
    }

    /**
     * crear ahorro apv
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();
        $savingTypes = SavingType::orderBy('name')->lists('name', 'id');

        return view('humanresources.apv.create', compact('employees', 'savingTypes'));
    }

    /**
     * editar ahorro apv
	 *
	 * @return Response
    */
    public function edit($apvId)
    {
        $saving = $this->saving->findOrFail($apvId);

        $employees = $this->employee->getCmb();
        $savingTypes = SavingType::orderBy('name')->lists('name', 'id');

        return view('humanresources.apv.edit', compact('saving', 'employees', 'savingTypes'));
    }

    /**
     * registrar ahorro apv
     *
     * @return Response
    */
    public function store(ApvFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $saving = $this->saving->create($data);

        return redirect()->action('HumanResources\ApvController@index');
    }

    /**
     * modificar ahorro apv
     *
     * @return Response
    */
    public function update(ApvEditFormRequest $request)
    {
        $data = $request->except('_token');

        $saving = $this->saving->findOrFail($data['saving_id']);
        $saving = $saving->update($data);

        return redirect()->action('HumanResources\ApvController@index');
    }
}
