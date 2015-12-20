<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;

use App\Models\HumanResources\Loan;

use App\Http\Requests\HumanResources\LoanFormRequest;

class LoanController extends Controller
{
    protected $loan;

    public function __construct(Loan $loan){
        $this->loan = $loan;
    }

    /**
     * listar prestamos por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $loans = $this->loan->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.loans.index', compact('loans'));
    }

    /**
     * crear prestamo
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        return view('humanresources.loans.create', compact('employees'));
    }

    /**
     * editar prestamo
	 *
	 * @return Response
    */
    public function edit($loanId)
    {
        return view('humanresources.loans.edit');
    }

    /**
     * registrar prestamo
     *
     * @return Response
    */
    public function store(LoanFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $loan = $this->loan->create($data);

        return redirect()->action('HumanResources\LoanController@index');
    }
}
