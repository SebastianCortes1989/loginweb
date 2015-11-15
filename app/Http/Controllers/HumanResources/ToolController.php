<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Tool;

class ToolController extends Controller
{
    protected $tool;

    public function __construct(Tool $tool){
        $this->tool = $tool;
    }

    /**
     *listar comisiones por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        $tools = $this->tool->orderBy('date')->get();

        return view('humanresources.tools.index', compact('tools'));
    }

    /**
     *crear comision
	 *
	 *return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.tools.create', compact('clients', 'employees'));
    }

    /**
     *registrar comision
     *
     *return Response
    */
    public function store(Request $request){
        $data = $request->except('_token');

        $tool = $this->tool->create($data);

        return redirect()->action('HumanResources\ToolController@index');
    }

    /**
     *editar comision
	 *
	 *return Response
    */
    public function edit($toolId)
    {
        return view('humanresources.tools.edit');
    }
}
