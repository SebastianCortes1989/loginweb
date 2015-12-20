<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Ccaf;

use App\Http\Requests\HumanResources\CcafFormRequest;

class CcafController extends Controller
{
    protected $ccaf;

    public function __construct(Ccaf $ccaf){
        $this->ccaf = $ccaf;
    }

    /**
     * listar prestamos ccaf por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $ccaf = $this->ccaf->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.ccaf.index', compact('ccaf'));
    }

    /**
     * crear prestamo ccaf
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        return view('humanresources.ccaf.create', compact('employees'));
    }

    /**
     * editar prestamo ccaf
	 *
	 * @return Response
    */
    public function edit($ccafId)
    {
        return view('humanresources.ccaf.edit');
    }

    /**
     * registrar prestamo ccaf
     *
     * @return Response
    */
    public function store(CcafFormRequest $request)
    {
        $data = $request->except('_token');

        $ccaf = $this->ccaf->create($data);

        return redirect()->action('HumanResources\CcafController@index');
    }
}
