<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;

use App\Models\HumanResources\Licensing;

use App\Http\Requests\HumanResources\LicensingFormRequest;
use App\Http\Requests\HumanResources\LicensingEditFormRequest;

class LicensingController extends Controller
{
    protected $licensing;
    protected $employee;

    public function __construct(Licensing $licensing, Employee $employee)
    {
        $this->licensing = $licensing;
        $this->employee = $employee;

        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
    }

    /**
     * listar licencias por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $licensings = $this->licensing->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.licensings.index', compact('licensings'));
    }

    /**
     * crear licencia
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();

        return view('humanresources.licensings.create', compact('employees'));
    }

    /**
     * editar licencia
	 *
	 * @return Response
    */
    public function edit($licensingId)
    {
        $licensing = $this->licensing->findOrFail($licensingId);

        $employees = $this->employee->getCmb();

        return view('humanresources.licensings.edit', compact('licensing', 'employees'));
    }

    /**
     * registrar licencia
     *
     * @return Response
    */
    public function store(LicensingFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $days = $this->licensing->days($data['start_date'], $data['end_date']);
        $data['days'] = $days;

        $licensing = $this->licensing->create($data);

        return redirect()->action('HumanResources\LicensingController@index');
    }

    /**
     * modificar licencia
     *
     * @return Response
    */
    public function update(LicensingEditFormRequest $request)
    {
        $data = $request->except('_token');

        $days = $this->licensing->days($data['start_date'], $data['end_date']);
        $data['days'] = $days;

        $licensing = $this->licensing->findOrFail($data['licensing_id']);
        $licensing = $licensing->update($data);

        return redirect()->action('HumanResources\LicensingController@index');
    }
}
