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
use App\Http\Requests\HumanResources\PermissionEditFormRequest;

class PermissionController extends Controller
{
    protected $permission;
    protected $employee;

    public function __construct(Permission $permission, Employee $employee)
    {
        $this->permission = $permission;
        $this->employee = $employee;
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
        $employees = $this->employee->getCmb();
        $permissionsTypes = PermissionType::orderBy('name')->lists('name', 'id');

        return view('humanresources.permissions.create', compact('employees', 'permissionsTypes'));
    }

    /**
     * editar permiso
	 *
	 * @return Response
    */
    public function edit($permissionId)
    {
        $permission = $this->permission->findOrFail($permissionId);

        $employees = $this->employee->getCmb();
        $permissionsTypes = PermissionType::orderBy('name')->lists('name', 'id');

        return view('humanresources.permissions.edit', compact('permission', 'employees', 'permissionsTypes'));
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
        
        $days = $this->permission->days($data['start_date'], $data['end_date']);
        $data['days'] = $days;

        $permission = $this->permission->create($data);

        return redirect()->action('HumanResources\PermissionController@index');
    }

    /**
     * modificar permiso
     *
     * @return Response
    */
    public function update(PermissionEditFormRequest $request)
    {
        $data = $request->except('_token');

        $days = $this->permission->days($data['start_date'], $data['end_date']);
        $data['days'] = $days;

        $permission = $this->permission->findOrFail($data['permission_id']);
        $permission = $permission->update($data);

        return redirect()->action('HumanResources\PermissionController@index');
    }
}
