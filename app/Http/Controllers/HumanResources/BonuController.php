<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\BonuType;

use App\Models\HumanResources\Bonus;

use App\Http\Requests\HumanResources\BonuFormRequest;

class BonuController extends Controller
{
    protected $bonus;
    protected $employee;

    public function __construct(Bonus $bonus, Employee $employee)
    {
        $this->bonus = $bonus;
        $this->employee = $employee;
    }

    /**
     * listar aguinaldos por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $bonus = $this->bonus->whereClientId(Auth::user()->client_id)->orderBy('date')->get();

        return view('humanresources.bonus.index', compact('bonus'));
    }
    /**
     * crear aguinaldo
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();;
        $bonusTypes = BonuType::orderBy('name')->lists('name', 'id');

        return view('humanresources.bonus.create', compact('employees', 'bonusTypes'));
    }

    /**
     * registrar aguinaldo
     *
     * @return Response
    */
    public function store(BonuFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $bonus = $this->bonus->create($data);

        return redirect()->action('HumanResources\BonuController@index');
    }

    /**
     * editar aguinaldo
	 *
	 * @return Response
    */
    public function edit($bonuId)
    {
        $employees = $this->employee->getCmb();
        $bonusTypes = BonuType::orderBy('name')->lists('name', 'id');

        $bonus = $this->bonus->findOrFail($bonuId);

        return view('humanresources.bonus.edit', compact('employees', 'bonusTypes', 'bonus'));
    }

    /**
     * modificar aguinaldo
     *
     * @return Response
    */
    public function update(BonuFormRequest $request)
    {
        $data = $request->except('_token');

        $bonus = $this->bonus->findOrFail($bonuId);
        $bonus = $bonus->update($data);

        return redirect()->action('HumanResources\BonuController@index');
    }
}
