<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \App;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Contract;
use App\Models\HumanResources\LoanType;

use App\Models\HumanResources\Loan;

use App\Http\Requests\HumanResources\LoanFormRequest;
use App\Http\Requests\HumanResources\LoanEditFormRequest;

class LoanController extends Controller
{
    protected $loan;
    protected $employee;

    public function __construct(Loan $loan, Employee $employee)
    {
        $this->loan = $loan;
        $this->employee = $employee;

        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
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
        $employees = $this->employee->getCmb();
        $loanTypes = LoanType::orderBy('name')->lists('name', 'id');
        
        return view('humanresources.loans.create', compact('employees', 'loanTypes'));
    }

    /**
     * editar prestamo
	 *
	 * @return Response
    */
    public function edit($loanId)
    {
        $loan = $this->loan->findOrFail($loanId);

        $employees = $this->employee->getCmb();
        $loanTypes = LoanType::orderBy('name')->lists('name', 'id');
        
        return view('humanresources.loans.edit', compact('loan', 'employees', 'loanTypes'));
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
        $loan->createQuotas();

        return redirect()->action('HumanResources\LoanController@index');
    }

    /**
     * modificar prestamo
     *
     * @return Response
    */
    public function update(LoanEditFormRequest $request)
    {
        $data = $request->except('_token');
        
        $loan = $this->loan->findOrFail($data['loan_id']);

        if($data['quotas'] != $loan->quotas)
        {
            $loan->update($data);
            $loan->deleteQuotas();
            $loan->createQuotas();
        }
        else
        {
            $loan = $loan->update($data);
        }

        return redirect()->action('HumanResources\LoanController@index');
    }
}
