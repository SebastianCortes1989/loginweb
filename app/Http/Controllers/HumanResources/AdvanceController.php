<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Advance;

class AdvanceController extends Controller
{
    protected $advance;

    public function __construct(Advance $advance){
        $this->advance = $advance;
    }

    /**
     * listar anticipos por empresa
	 *
	 * @return Response
    */
    public function index($clientId = null)
    {
        $advances = $this->advance->all();
        
        return view('humanresources.advances.index', compact('advances'));
    }

    /**
     * crear anticipo
	 *
	 * @return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.advances.create', compact('clients', 'employees'));
    }

    /**
     * editar anticipo
	 *
	 * @return Response
    */
    public function edit($advanceId)
    {
        return view('humanresources.advances.edit');
    }

    /**
     * registrar anticipo
     *
     * @return Response
    */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $advance = $this->advance->create($data);

        return redirect()->action('HumanResources\AdvanceController@index');
    }
}
