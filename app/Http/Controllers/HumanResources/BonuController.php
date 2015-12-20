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

    public function __construct(Bonus $bonus){
        $this->bonus = $bonus;
    }

    /**
     *listar aguinaldos por empresa
	 *
	 *return Response
    */
    public function index()
    {
        $bonus = $this->bonus->whereClientId(Auth::user()->client_id)->orderBy('date')->get();

        return view('humanresources.bonus.index', compact('bonus'));
    }
    /**
     *crear aguinaldo
	 *
	 *return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        $bonusTypes = BonuType::orderBy('name')->lists('name', 'id');

        return view('humanresources.bonus.create', compact('employees', 'bonusTypes'));
    }

    /**
     *registrar aguinaldo
     *
     *return Response
    */
    public function store(BonuFormRequest $request){
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $bonus = $this->bonus->create($data);

        return redirect()->action('HumanResources\BonuController@index');
    }

    /**
     *editar aguinaldo
	 *
	 *return Response
    */
    public function edit($bonuId)
    {
        return view('humanresources.bonus.edit');
    }
}
