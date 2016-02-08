<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\Entity\Branch;
use App\Models\HumanResources\Contract;

use App\Models\HumanResources\Transfer;
use App\Models\HumanResources\TransferCause;

use App\Http\Requests\HumanResources\TransferFormRequest;
use App\Http\Requests\HumanResources\TransferEditFormRequest;

class TransferController extends Controller
{
    protected $transfer;
    protected $employee;

    public function __construct(Transfer $transfer, Employee $employee)
    {
        $this->transfer = $transfer;
        $this->employee = $employee;
    }

    /**
     * listar traslados por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $transfers = $this->transfer->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.transfers.index', compact('transfers'));
    }

    /**
     * crear traslado
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();
        $branchs = Branch::whereClientId(Auth::user()->client_id)->lists('name', 'id');        
        $causes = TransferCause::lists('name', 'id');

        return view('humanresources.transfers.create', compact('employees', 'branchs', 'causes'));
    }

    /**
     * editar traslado
	 *
	 * @return Response
    */
    public function edit($transferId)
    {
        $transfer = $this->transfer->findOrFail($transferId);

        $employees = $this->employee->getCmb();
        $branchs = Branch::whereClientId(Auth::user()->client_id)->lists('name', 'id');        
        $causes = TransferCause::lists('name', 'id');

        return view('humanresources.transfers.edit', compact('transfer', 'employees', 'branchs', 'causes'));
    }

    /**
     * registrar traslado
     *
     * @return Response
    */
    public function store(TransferFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $transfer = $this->transfer->create($data);

        return redirect()->action('HumanResources\TransferController@index');
    }

    /**
     * modificar traslado
     *
     * @return Response
    */
    public function update(TransferEditFormRequest $request)
    {
        $data = $request->except('_token');
        
        $transfer = $this->transfer->findOrFail($data['transfer_id']);
        $transfer = $transfer->update($data);

        return redirect()->action('HumanResources\TransferController@index');
    }
}