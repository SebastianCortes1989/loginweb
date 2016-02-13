<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\Letter;
use App\Models\Admin\Causal;

use App\Http\Requests\HumanResources\LetterFormRequest;

class LetterController extends Controller
{
    protected $letter;
    protected $employee;

    public function __construct(Letter $letter, Employee $employee)
    {
        $this->letter = $letter;
        $this->employee = $employee;

        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
    }

    /**
     * listar cartas por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $letters = $this->letter->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.letters.index', compact('letters'));
    }

    /**
     * crear carta
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();
        $causals = Causal::orderBy('name')->lists('name', 'id');

        return view('humanresources.letters.create', compact('employees', 'causals'));
    }

    /**
     * editar carta
	 *
	 * @return Response
    */
    public function edit($letterId)
    {
        $letter = $this->letter->findOrFail($letterId);

        $employees = $this->employee->getCmb();
        $causals = Causal::orderBy('name')->lists('name', 'id');

        return view('humanresources.letters.edit', compact('letter', 'employees', 'causals'));
    }

    /**
     * registrar carta
     *
     * @return Response
    */
    public function store(LetterFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $letter = $this->letter->create($data);

        return redirect()->action('HumanResources\LetterController@index');
    }

    /**
     * modificar carta
     *
     * @return Response
    */
    public function update(LetterEditFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $letter = $this->letter->findOrFail($data['letter_id']);
        $letter = $this->letter->update($data);

        return redirect()->action('HumanResources\LetterController@index');
    }
}
