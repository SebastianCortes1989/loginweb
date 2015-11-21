<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Antique;

class AntiqueController extends Controller
{
    protected $antique;

    public function __construct(Antique $antique){
        $this->antique = $antique;
    }

    /**
     * listar certificados de antiguedad por empresa
	 *
	 * @return Response
    */
    public function index($clientId = null)
    {
        $antiques = $this->antique->all();

        return view('humanresources.antiques.index', compact('antiques'));
    }

    /**
     * crear certificado de antiguedad
	 *
	 * @return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.antiques.create', compact('clients', 'employees'));
    }

    /**
     * editar certificado de antiguedad
	 *
	 * @return Response
    */
    public function edit($licensingId)
    {
        return view('humanresources.antiques.edit');
    }

    /**
     * registrar certificado de antiguedad
     *
     * @return Response
    */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $antique = $this->antique->create($data);

        return redirect()->action('HumanResources\AntiqueController@index');
    }
}
