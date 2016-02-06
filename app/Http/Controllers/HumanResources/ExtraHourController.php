<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;

use App\Models\HumanResources\ExtraHour;

use App\Http\Requests\HumanResources\ExtraHourFormRequest;
use App\Http\Requests\HumanResources\ExtraHourEditFormRequest;

class ExtraHourController extends Controller
{
    protected $extraHour;
    protected $employee;
    protected $percentajes = [50  => '50%', 100 => '100%'];

    public function __construct(ExtraHour $extraHour, Employee $employee)
    {
        $this->extraHour = $extraHour;
        $this->employee = $employee;
    }

    /**
     * listar horas extras por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $extraHours = $this->extraHour->whereClientId(Auth::user()->client_id)->orderBy('start_date')->get();

        return view('humanresources.extrahours.index', compact('extraHours'));
    }

    /**
     * crear hora extra
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();
        $percentajes = $this->percentajes;

        return view('humanresources.extrahours.create', compact('employees', 'percentajes'));
    }

    /**
     * registrar hora extra
     *
     * @return Response
    */
    public function store(ExtraHourFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $hours = $this->extraHour->hours($data['start_date'], $data['end_date']);
        $minutes = $this->extraHour->minutes($data['start_date'], $data['end_date']);

        $data['hours'] = $hours;
        $data['minutes'] = $minutes;

        $extraHour = $this->extraHour->create($data);

        return redirect()->action('HumanResources\ExtraHourController@index');
    }

    /**
     * editar hora extra
	 *
	 * @return Response
    */
    public function edit($extraHourId)
    {
        $extraHour = $this->extraHour->findOrFail($extraHourId);

        $employees = $this->employee->getCmb();
        $percentajes = $this->percentajes;

        return view('humanresources.extrahours.edit', compact('extraHour', 'employees', 'percentajes'));
    }

    /**
    * actualizar hora extra
    *
    * @return Response
    */
    public function update(ExtraHourEditFormRequest $request)
    {
        $data = $request->except('_token');

        $hours = $this->extraHour->hours($data['start_date'], $data['end_date']);
        $minutes = $this->extraHour->minutes($data['start_date'], $data['end_date']);

        $data['hours'] = $hours;
        $data['minutes'] = $minutes;

        $extraHour = $this->extraHour->findOrFail($data['extra_hour_id']);
        $extraHour = $extraHour->update($data);

        return redirect()->action('HumanResources\ExtraHourController@index');
    }
}
