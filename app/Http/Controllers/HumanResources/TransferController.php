<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Transfer;

use App\Http\Requests\HumanResources\TransferFormRequest;

class TransferController extends Controller
{
    protected $transfer;

    public function __construct(Transfer $transfer){
        $this->transfer = $transfer;
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
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        return view('humanresources.transfers.create', compact('employees'));
    }

    /**
     * editar traslado
	 *
	 * @return Response
    */
    public function edit($licensingId)
    {
        return view('humanresources.transfers.edit');
    }

    /**
     * registrar traslado
     *
     * @return Response
    */
    public function store(TransferFormRequest $request)
    {
        $data = $request->except('_token');

        $transfer = $this->transfer->create($data);

        return redirect()->action('HumanResources\TransferController@index');
    }
}