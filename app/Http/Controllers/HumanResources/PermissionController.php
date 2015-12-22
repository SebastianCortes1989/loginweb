<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\PermissionType;

use App\Models\HumanResources\Permission;

use App\Http\Requests\HumanResources\PermissionFormRequest;

class PermissionController extends Controller
{
    protected $permission;

    public function __construct(Permission $permission){
        $this->permission = $permission;
    }

    /**
     * listar permisos por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $permissions = $this->permission->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.permissions.index', compact('permissions'));
    }

    /**
     * crear permiso
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        $permissionsTypes = PermissionType::orderBy('name')->lists('name', 'id');

        return view('humanresources.permissions.create', compact('employees', 'permissionsTypes'));
    }

    /**
     * editar permiso
	 *
	 * @return Response
    */
    public function edit($licensingId)
    {
        return view('humanresources.permissions.edit');
    }

    /**
     * registrar permiso
     *
     * @return Response
    */
    public function store(PermissionFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $permission = $this->permission->create($data);

        return redirect()->action('HumanResources\PermissionController@index');
    }
}
