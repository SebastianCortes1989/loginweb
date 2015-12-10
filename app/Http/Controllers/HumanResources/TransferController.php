<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function index($clientId = null)
    {
        $transfers = $this->transfer->all();

        return view('humanresources.transfers.index', compact('transfers'));
    }

    /**
     * crear traslado
	 *
	 * @return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.transfers.create', compact('clients', 'employees'));
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