<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;
use App\Models\Admin\ContractType;

use App\Models\Entity\Employee;
use App\Models\Entity\Charge;
use App\Models\Entity\Branch;

use App\Models\HumanResources\Contract;
use App\Models\HumanResources\Journal;

use App\Http\Requests\HumanResources\ContractFormRequest;

class ContractController extends Controller
{
    protected $contract;
    protected $journal;
    protected $workingTypes = ['Continua' => 'Jornada Continua', 'Turnos' => 'Turnos'];
    protected $days = [1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sabado', 7 => 'Domingo'];

    public function __construct(Contract $contract, Journal $journal)
    {
        $this->contract = $contract;
        $this->journal = $journal;
    }

    /*
     * listar contratos por empresa
	 *
	 * return Response
    */
    public function index()
    {
        $contracts = $this->contract->whereClientId(Auth::user()->client_id)->orderBy('start_date')->get();

        return view('humanresources.contracts.index', compact('contracts'));
    }

    /*
     * crear contrato
	 *
	 * return Response
    */
    public function create()
    {
        $contracts = $this->contract->whereClientId(Auth::user()->client_id)->whereStatus('Vigente')->lists('employee_id');
        $employees = $this->employee->whereClientId(Auth::user()->client_id)->whereNotIn('id', $contracts)->orderBy('name')->lists('name', 'id');

        if(count($employees) == 0)
        {
            abort(403, 'No existen trabajadores sin contrato.');
        }

        $charges = Charge::whereClientId(Auth::user()->client_id)->orderBy('name')->lists('name', 'id');
        $contractTypes = ContractType::orderBy('name')->lists('name', 'id');
        $branchs = Branch::whereClientId(Auth::user()->client_id)->orderBy('name')->lists('name', 'id');
        $workingTypes = $this->workingTypes;

        return view('humanresources.contracts.create', compact('charges', 'employees', 'contractTypes', 'branchs', 'workingTypes'));
    }

    /*
     * editar contrato
	 *
	 * return Response
    */
    public function edit($contractId)
    {
        return view('humanresources.contracts.edit');
    }

    /*
     * registrar contrato
     *
     * return Response
    */
    public function store(ContractFormRequest $request)
    {
        $data = $request->except('_token');
        $data['contract_type_id'] = $request->get('contract_type');
        
        $contract = $this->contract->create($data);

        return redirect()->action('HumanResources\ContractController@workingType', [$contract->id]);
    }

    /*
     * formulario registrar jornada
     *
     * return Response
    */
    public function workingType($contractId)
    {
        $days = $this->days;

        $contract = $this->contract->findOrFail($contractId);

        return view('humanresources.contracts.working_type', compact('days', 'contract'));
    }

    /*
     * registrar jornada
     *
     * return Response
    */
    public function workingTypeStore(Request $request)
    {
        $data = $request->except('_token');

        $journal = $this->journal->create($data);

        return redirect()->action('HumanResources\ContractController@remunerations', [$journal->contract_id]);
    }

    /*
     * formulario registrar remuneraciones
     *
     * return Response
    */
    public function remunerations($contractId)
    {
        $contract = $this->contract->findOrFail($contractId);

        return view('humanresources.contracts.remunerations', compact('contract'));
    }

    /*
     * registrar remuneraciones
     *
     * return Response
    */
    public function remunerationsStore(Request $request)
    {
        $data = $request->except('_token');
        
        $contract = $this->contract->findOrFail($data['contract_id'])->addRemuneration($data);

        return redirect()->action('HumanResources\ContractController@index');
    }
}

