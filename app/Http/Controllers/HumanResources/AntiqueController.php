<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;
use App\Models\Entity\Employee;

use App\Models\HumanResources\Contract;
use App\Models\HumanResources\Antique;

use App\Http\Requests\HumanResources\AntiqueFormRequest;
use App\Http\Requests\HumanResources\AntiqueEditFormRequest;

class AntiqueController extends Controller
{
    protected $antique;
    protected $employee;

    public function __construct(Antique $antique, Employee $employee)
    {
        $this->antique = $antique;
        $this->employee = $employee;

        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
    }

    /**
     * listar certificados de antiguedad por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $antiques = $this->antique->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.antiques.index', compact('antiques'));
    }

    /**
     * crear certificado de antiguedad
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();

        return view('humanresources.antiques.create', compact('employees'));
    }

    /**
     * editar certificado de antiguedad
	 *
	 * @return Response
    */
    public function edit($antiqueId)
    {
        $antique = $this->antique->findOrFail($antiqueId);

        $employees = $this->employee->getCmb();

        return view('humanresources.antiques.edit', compact('antique', 'employees'));
    }

    /**
     * registrar certificado de antiguedad
     *
     * @return Response
    */
    public function store(AntiqueFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;

        $antique = $this->antique->create($data);

        return redirect()->action('HumanResources\AntiqueController@index');
    }

    /**
     * modificar certificado de antiguedad
     *
     * @return Response
    */
    public function update(AntiqueEditFormRequest $request)
    {
        $data = $request->except('_token');

        $antique = $this->antique->findOrFail($data['antique_id']);
        $antique = $antique->update($data);

        return redirect()->action('HumanResources\AntiqueController@index');
    }
}
