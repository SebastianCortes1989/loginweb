<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\CcafType;
use App\Models\Admin\Compensacion;

use App\Models\HumanResources\Ccaf;

use App\Http\Requests\HumanResources\CcafFormRequest;
use App\Http\Requests\HumanResources\CcafEditFormRequest;

class CcafController extends Controller
{
    protected $ccaf;
    protected $employee;

    public function __construct(Ccaf $ccaf, Employee $employee)
    {
        $this->ccaf = $ccaf;
        $this->employee = $employee;
    }

    /**
     * listar prestamos ccaf por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $ccaf = $this->ccaf->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.ccaf.index', compact('ccaf'));
    }

    /**
     * crear prestamo ccaf
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();
        $types = CcafType::orderBy('name')->lists('name', 'id');
        $compensacions = Compensacion::orderBy('name')->lists('name', 'id');

        return view('humanresources.ccaf.create', compact('employees', 'types', 'compensacions'));
    }

    /**
     * editar prestamo ccaf
	 *
	 * @return Response
    */
    public function edit($ccafId)
    {
        $ccaf = $this->ccaf->findOrFail($ccafId);

        $employees = $this->employee->getCmb();
        $types = CcafType::orderBy('name')->lists('name', 'id');
        $compensacions = Compensacion::orderBy('name')->lists('name', 'id');

        return view('humanresources.ccaf.edit', compact('ccaf', 'employees', 'types', 'compensacions'));
    }

    /**
     * registrar prestamo ccaf
     *
     * @return Response
    */
    public function store(CcafFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $ccaf = $this->ccaf->create($data);
        $quotas = $ccaf->createQuotas();

        return redirect()->action('HumanResources\CcafController@index');
    }

    /**
     * registrar prestamo ccaf
     *
     * @return Response
    */
    public function update(CcafEditFormRequest $request)
    {
        $data = $request->except('_token');

        $ccaf = $this->ccaf->findOrFail($data['ccaf_id']);    
        
        if($data['quotas'] != $ccaf->quotas)
        {
            $ccaf->update($data);
            $ccaf->deleteQuotas();
            $ccaf->createQuotas();
        }
        else
        {
            $ccaf = $ccaf->update($data);
        }

        return redirect()->action('HumanResources\CcafController@index');
    }
}
