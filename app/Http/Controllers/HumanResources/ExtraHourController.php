<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\ExtraHour;

use App\Http\Requests\HumanResources\ExtraHourFormRequest;

class ExtraHourController extends Controller
{
    protected $extraHour;

    public function __construct(ExtraHour $extraHour){
        $this->extraHour = $extraHour;
    }

    /**
     *listar comisiones por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        $extraHours = $this->extraHour->orderBy('start_date')->get();

        return view('humanresources.extrahours.index', compact('extraHours'));
    }

    /**
     *crear comision
	 *
	 *return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.extrahours.create', compact('clients', 'employees'));
    }

    /**
     *registrar comision
     *
     *return Response
    */
    public function store(ExtraHourFormRequest $request){
        $data = $request->except('_token');

        $extraHour = $this->extraHour->create($data);

        return redirect()->action('HumanResources\ExtraHourController@index');
    }

    /**
     *editar comision
	 *
	 *return Response
    */
    public function edit($extraHourId)
    {
        return view('humanresources.extrahours.edit');
    }
}
