<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Antique;

use App\Http\Requests\HumanResources\AntiqueFormRequest;

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
    public function index()
    {
        $antiques = $this->antique->whereClientId(Auth::user()->clientId)->get();

        return view('humanresources.antiques.index', compact('antiques'));
    }

    /**
     * crear certificado de antiguedad
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = Employee::whereClientId(Auth::user()->client_id)->orderBy('name')->lists('name', 'id');

        return view('humanresources.antiques.create', compact('employees'));
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
    public function store(AntiqueFormRequest $request)
    {
        $data = $request->except('_token');

        $antique = $this->antique->create($data);

        return redirect()->action('HumanResources\AntiqueController@index');
    }
}
