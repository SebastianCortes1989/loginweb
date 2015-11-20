<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Saving;

class ApvController extends Controller
{
    protected $saving;

    public function __construct(Saving $saving){
        $this->saving = $saving;
    }

    /**
     * listar ahorro apv por empresa
	 *
	 * @return Response
    */
    public function index($clientId = null)
    {
        $savings = $this->saving->all();

        return view('humanresources.apv.index', compact('savings'));
    }

    /**
     * crear ahorro apv
	 *
	 * @return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.apv.create', compact('clients', 'employees'));
    }

    /**
     * editar ahorro apv
	 *
	 * @return Response
    */
    public function edit($apvId)
    {
        return view('humanresources.apv.edit');
    }

    /**
     * registrar ahorro apv
     *
     * @return Response
    */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $saving = $this->saving->create($data);

        return redirect()->action('HumanResources\ApvController@index');
    }
}
