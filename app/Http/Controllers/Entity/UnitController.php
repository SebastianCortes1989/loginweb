<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\Entity\Management;
use App\Models\Entity\Unit;

class UnitController extends Controller
{
    protected $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    /**
     *listar unidades por empresa
	 *
	 *return Response
    */
    public function index($clientId = null)
    {
        $units = $this->unit->orderBy('name')->get();

        return view('entity.units.index', compact('units'));
    }

    /**
     *crear unidad
	 *
	 *return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');
        $managements = Management::orderBy('name')->lists('name', 'id');

        return view('entity.units.create', compact('clients', 'employees', 'managements'));
    }

    /**
     *editar unidad
	 *
	 *return Response
    */
    public function edit($unitId)
    {
        return view('entity.units.edit');
    }

    /*
     * registrar unidad
     *
     * return Response
    */
    public function store(Request $request){
        $data = $request->except('_token');

        $unit = $this->unit->create($data);

        return redirect()->action('Entity\UnitController@index');
    }
}
