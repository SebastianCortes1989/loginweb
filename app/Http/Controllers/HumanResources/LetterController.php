<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Letter;

use App\Http\Requests\HumanResources\LetterFormRequest;

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
    public function index()
    {
        $letters = $this->letter->whereClientId(Auth::user()->clientId)->get();

        return view('humanresources.letters.index', compact('letters'));
    }

    /**
     * crear prestamo ccaf
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = Employee::whereClientId(Auth::user()->client_id)->orderBy('name')->lists('name', 'id');

        return view('humanresources.letters.create', compact('employees'));
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
    public function store(LetterFormRequest $request)
    {
        $data = $request->except('_token');

        $letter = $this->letter->create($data);

        return redirect()->action('HumanResources\LetterController@index');
    }
}
