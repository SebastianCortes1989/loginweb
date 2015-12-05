<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

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
    public function index($clientId = null)
    {
        $bonus = $this->bonus->orderBy('date')->get();

        return view('humanresources.bonus.index', compact('bonus'));
    }
    /**
     *crear aguinaldo
	 *
	 *return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.bonus.create', compact('clients', 'employees'));
    }

    /**
     *registrar aguinaldo
     *
     *return Response
    */
    public function store(BonuFormRequest $request){
        $data = $request->except('_token');

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
