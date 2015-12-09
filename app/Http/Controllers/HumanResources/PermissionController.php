<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

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
    public function index($clientId = null)
    {
        $permissions = $this->permission->all();

        return view('humanresources.permissions.index', compact('permissions'));
    }

    /**
     * crear permiso
	 *
	 * @return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.permissions.create', compact('clients', 'employees'));
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

        $permission = $this->permission->create($data);

        return redirect()->action('HumanResources\PermissionController@index');
    }
}
