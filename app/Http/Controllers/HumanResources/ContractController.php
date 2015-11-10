<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;
use App\Models\Admin\ContractType;

use App\Models\Entity\Employee;
use App\Models\Entity\Charge;
use App\Models\Entity\Branch;

use App\Models\HumanResources\Contract;

class ContractController extends Controller
{
    protected $contract;
    protected $workingTypes = ['Continua' => 'Jornada Continua', 'Turnos' => 'Turnos'];

    public function __construct(Contract $contract){
        $this->contract = $contract;
    }

    /*
     * listar contratos por empresa
	 *
	 * return Response
    */
    public function index($clientId = null)
    {
        $contracts = $this->contract->orderBy('start_date')->get();

        return view('humanresources.contracts.index', compact('contracts'));
    }

    /*
     * crear contrato
	 *
	 * return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $charges = Charge::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');
        $contractTypes = ContractType::orderBy('name')->lists('name', 'id');
        $branchs = Branch::orderBy('name')->lists('name', 'id');
        $workingTypes = $this->workingTypes;

        return view('humanresources.contracts.create', compact('clients', 'charges', 'employees', 'contractTypes', 'branchs', 'workingTypes'));
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
    public function store(Request $request){
        $data = $request->except('_token');
        $data['employee_id'] = $request->get('responsible_id');
        $data['working_typ_id'] = $request->get('working_type');
        
        $contract = $this->contract->create($data);

        return redirect()->action('HumanResources\ContractController@workingType');
    }
}
