<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\Letter;
use App\Models\Admin\Causal;

use App\Models\HumanResources\Settlement;

use App\Http\Requests\HumanResources\SettlementFormRequest;

class SettlementController extends Controller
{
    protected $settlement;
    protected $employee;

    public function __construct(Settlement $settlement, Employee $employee)
    {
        $this->settlement = $settlement;
        $this->employee = $employee;

        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
    }

    /**
     * listar finiquitos
	 *
	 * @return Response
    */
    public function index()
    {
        $settlements = $this->settlement->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.settlements.index', compact('settlements'));
    }

    /**
     * crear finiquito
	 *
	 * @return Response
    */
    public function create()
    {
        //$letters = Letter::whereClientId(Auth::user()->client_id)->lists('employee_id');

        $employees = $this->employee->getCmb();
        $causals = Causal::orderBy('name')->lists('name', 'id');

        return view('humanresources.settlements.create', compact('employees', 'causals'));
    }

    /**
     * editar finiquito
	 *
	 * @return Response
    */
    public function edit($settlementId)
    {
        $settlement = $this->settlement->findOrFail($settlementId);

        $employees = $this->employee->getCmb();
        $causals = Causal::orderBy('name')->lists('name', 'id');

        return view('humanresources.settlements.edit', compact('settlement', 'employees', 'causals'));
    }

    /**
     * registrar finiquito
     *
     * @return Response
    */
    public function store(SettlementFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first()->finalizes();
        $data['contract_id'] = $contract->id;

        $letter = Letter::whereEmployeeId($data['employee_id'])->first();
        $data['letter_id'] = $letter->id;
        
        $settlement = $this->settlement->create($data);

        return redirect()->action('HumanResources\SettlementController@index');
    }

    /**
     * modificar finiquito
     *
     * @return Response
    */
    public function update(SettlementEditFormRequest $request)
    {
        $data = $request->except('_token');
        
        $settlement = $this->settlement->findOrFail($data['settlement_id']);
        $settlement = $settlement->update($data);

        return redirect()->action('HumanResources\SettlementController@index');
    }
}
