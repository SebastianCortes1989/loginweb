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

    public function __construct(Settlement $settlement){
        $this->settlement = $settlement;
    }

    /**
     * listar prestamos ccaf por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $settlements = $this->settlement->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.settlements.index', compact('settlements'));
    }

    /**
     * crear prestamo ccaf
	 *
	 * @return Response
    */
    public function create()
    {
        //$letters = Letter::whereClientId(Auth::user()->client_id)->lists('employee_id');

        $employees = Letter::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        $causals = Causal::orderBy('name')->lists('name', 'id');

        return view('humanresources.settlements.create', compact('employees', 'causals'));
    }

    /**
     * editar prestamo ccaf
	 *
	 * @return Response
    */
    public function edit($letterId)
    {
        return view('humanresources.settlements.edit');
    }

    /**
     * registrar prestamo ccaf
     *
     * @return Response
    */
    public function store(SettlementFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $letter = Letter::whereEmployeeId($data['employee_id'])->first();
        $data['letter_id'] = $letter->id;
        
        $settlement = $this->settlement->create($data);

        return redirect()->action('HumanResources\SettlementController@index');
    }
}
