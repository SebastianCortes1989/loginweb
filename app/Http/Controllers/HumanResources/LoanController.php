<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Loan;

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
    public function index($clientId = null)
    {
        $loans = $this->loan->all();

        return view('humanresources.loans.index', compact('loans'));
    }

    /**
     * crear prestamo
	 *
	 * @return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.loans.create', compact('clients', 'employees'));
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
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $loan = $this->loan->create($data);

        return redirect()->action('HumanResources\LoanController@index');
    }
}
