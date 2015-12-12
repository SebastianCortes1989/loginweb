<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

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
        $settlements = $this->settlement->whereClientId(Auth::user()->clientId)->get();

        return view('humanresources.settlements.index', compact('settlements'));
    }

    /**
     * crear prestamo ccaf
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = Employee::whereClientId(Auth::user()->client_id)->orderBy('name')->lists('name', 'id');

        return view('humanresources.settlements.create', compact('employees'));
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

        $settlement = $this->settlement->create($data);

        return redirect()->action('HumanResources\SettlementController@index');
    }
}
