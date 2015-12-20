<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Tool;

use App\Http\Requests\HumanResources\ToolFormRequest;

class ToolController extends Controller
{
    protected $tool;

    public function __construct(Tool $tool){
        $this->tool = $tool;
    }

    /**
     *listar desg. Herramientas por empresa
	 *
	 *return Response
    */
    public function index()
    {
        $tools = $this->tool->whereClientId(Auth::user()->client_id)->orderBy('date')->get();

        return view('humanresources.tools.index', compact('tools'));
    }

    /**
     *crear desg. Herramienta
	 *
	 *return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        return view('humanresources.tools.create', compact('employees'));
    }

    /**
     *registrar desg. Herramienta
     *
     *return Response
    */
    public function store(ToolFormRequest $request){
        $data = $request->except('_token');

        $tool = $this->tool->create($data);

        return redirect()->action('HumanResources\ToolController@index');
    }

    /**
     *editar desg. Herramienta
	 *
	 *return Response
    */
    public function edit($toolId)
    {
        return view('humanresources.tools.edit');
    }
}
