<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;

use App\Models\HumanResources\Tool;

use App\Http\Requests\HumanResources\ToolFormRequest;
use App\Http\Requests\HumanResources\ToolEditFormRequest;

class ToolController extends Controller
{
    protected $tool;
    protected $employee;

    public function __construct(Tool $tool, Employee $employee)
    {
        $this->tool = $tool;
        $this->employee = $employee;

        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
    }

    /**
     * listar desg. Herramientas por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $tools = $this->tool->whereClientId(Auth::user()->client_id)->orderBy('date')->get();

        return view('humanresources.tools.index', compact('tools'));
    }

    /**
     * crear desg. Herramienta
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();

        return view('humanresources.tools.create', compact('employees'));
    }

    /**
     * registrar desg. Herramienta
     *
     * @return Response
    */
    public function store(ToolFormRequest $request){
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $tool = $this->tool->create($data);

        return redirect()->action('HumanResources\ToolController@index');
    }

    /**
     * editar desg. Herramienta
	 *
	 * @return Response
    */
    public function edit($toolId)
    {
        $tool = $this->tool->findOrFail($toolId);

        $employees = $this->employee->getCmb();

        return view('humanresources.tools.edit', compact('tool', 'employees'));
    }

    /**
     * registrar desg. Herramienta
     *
     * @return Response
    */
    public function update(ToolEditFormRequest $request){
        $data = $request->except('_token');
        
        $tool = $this->tool->findOrFail($data['tool_id']);
        $tool = $tool->update($data);

        return redirect()->action('HumanResources\ToolController@index');
    }
}
