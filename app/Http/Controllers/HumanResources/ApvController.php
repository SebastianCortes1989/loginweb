<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Saving;

use App\Http\Requests\HumanResources\ApvFormRequest;

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
    public function index()
    {
        $savings = $this->saving->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.apv.index', compact('savings'));
    }

    /**
     * crear ahorro apv
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        return view('humanresources.apv.create', compact('employees'));
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
    public function store(ApvFormRequest $request)
    {
        $data = $request->except('_token');

        $saving = $this->saving->create($data);

        return redirect()->action('HumanResources\ApvController@index');
    }
}
