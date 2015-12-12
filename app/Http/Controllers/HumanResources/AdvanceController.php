<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Advance;

use App\Http\Requests\HumanResources\AdvanceFormRequest;

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
    public function index()
    {
        $advances = $this->advance->whereClientId(Auth::user()->clientId)->get();
        
        return view('humanresources.advances.index', compact('advances'));
    }

    /**
     * crear anticipo
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = Employee::whereClientId(Auth::user()->client_id)->orderBy('name')->lists('name', 'id');

        return view('humanresources.advances.create', compact('employees'));
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
    public function store(AdvanceFormRequest $request)
    {
        $data = $request->except('_token');

        $advance = $this->advance->create($data);

        return redirect()->action('HumanResources\AdvanceController@index');
    }
}
