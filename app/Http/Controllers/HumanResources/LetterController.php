<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Letter;

class LetterController extends Controller
{
    protected $letter;

    public function __construct(Letter $letter){
        $this->letter = $letter;
    }

    /**
     * listar prestamos ccaf por empresa
	 *
	 * @return Response
    */
    public function index($clientId = null)
    {
        $letters = $this->letter->all();

        return view('humanresources.letters.index', compact('letters'));
    }

    /**
     * crear prestamo ccaf
	 *
	 * @return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.letters.create', compact('clients', 'employees'));
    }

    /**
     * editar prestamo ccaf
	 *
	 * @return Response
    */
    public function edit($letterId)
    {
        return view('humanresources.letters.edit');
    }

    /**
     * registrar prestamo ccaf
     *
     * @return Response
    */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $letter = $this->letter->create($data);

        return redirect()->action('HumanResources\LetterController@index');
    }
}
