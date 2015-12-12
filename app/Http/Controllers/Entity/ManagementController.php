<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\Entity\Management;

use App\Http\Requests\Entity\ManagementFormRequest;

class ManagementController extends Controller
{
    protected $management;

    public function __construct(Management $management)
    {
        $this->management = $management;
    }

    /**
     *listar gerencias por empresa
	 *
	 *return Response
    */
    public function index()
    {
        $managements = $this->management->whereClientId(Auth::user()->client_id)->orderBy('name')->get();

        return view('entity.managements.index', compact('managements'));
    }

    /**
     *crear gerencia
	 *
	 *return Response
    */
    public function create()
    {
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('entity.managements.create', compact('employees'));
    }

    /**
     *editar gerencia
	 *
	 *return Response
    */
    public function edit($managementId)
    {
        return view('entity.managements.edit');
    }

    /*
     * registrar gerencia
     *
     * return Response
    */
    public function store(ManagementFormRequest $request){
        $data = $request->except('_token');
        $data['employee_id'] = $request->get('responsible_id');

        $management = $this->management->create($data);

        return redirect()->action('Entity\ManagementController@index');
    }
}
