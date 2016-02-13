<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\BondType;

use App\Models\HumanResources\Bond;

use App\Http\Requests\HumanResources\BondFormRequest;
use App\Http\Requests\HumanResources\BondEditFormRequest;

class BondController extends Controller
{
    protected $bond;
    protected $employee;

    public function __construct(Bond $bond, Employee $employee)
    {
        $this->bond = $bond;
        $this->employee = $employee;

        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
    }

    /**
     * listar bonos por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $bonds = $this->bond->whereClientId(Auth::user()->client_id)->orderBy('date')->get();

        return view('humanresources.bonds.index', compact('bonds'));
    }

    /**
     * crear bono
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();
        $bondsTypes = BondType::orderBy('name')->lists('name', 'id');

        return view('humanresources.bonds.create', compact('employees', 'bondsTypes'));
    }

    /**
     * registrar bono
     *
     * @return Response
    */
    public function store(BondFormRequest $request){
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $bond = $this->bond->create($data);

        return redirect()->action('HumanResources\BondController@index');
    }

    /**
     * editar bono
	 *
	 * @return Response
    */
    public function edit($bondId)
    {
        $bond = $this->bond->findOrFail($bondId);

        $employees = $this->employee->getCmb();
        $bondsTypes = BondType::orderBy('name')->lists('name', 'id');

        return view('humanresources.bonds.edit', compact('bond', 'employees', 'bondsTypes'));
    }

    /**
     * actualiza bono
     *
     * @return Response
    */
    public function update(BondEditFormRequest $request){
        $data = $request->except('_token');

        $bond = $this->bond->findOrFail($data['bond_id']);
        $bond = $bond->update($data);

        return redirect()->action('HumanResources\BondController@index');
    }
}
