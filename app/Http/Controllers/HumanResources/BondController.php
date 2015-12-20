<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Bond;

use App\Http\Requests\HumanResources\BondFormRequest;

class BondController extends Controller
{
    protected $bond;

    public function __construct(Bond $bond){
        $this->bond = $bond;
    }

    /**
     *listar bonos por empresa
	 *
	 *return Response
    */
    public function index()
    {
        $bonds = $this->bond->whereClientId(Auth::user()->client_id)->orderBy('date')->get();

        return view('humanresources.bonds.index', compact('bonds'));
    }

    /**
     *crear bono
	 *
	 *return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        return view('humanresources.bonds.create', compact('employees'));
    }

    /**
     *registrar bono
     *
     *return Response
    */
    public function store(BondFormRequest $request){
        $data = $request->except('_token');

        $bond = $this->bond->create($data);

        return redirect()->action('HumanResources\BondController@index');
    }

    /**
     *editar bono
	 *
	 *return Response
    */
    public function edit($bondId)
    {
        return view('humanresources.bonds.edit');
    }
}
