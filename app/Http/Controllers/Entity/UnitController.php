<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\Entity\Management;
use App\Models\Entity\Unit;

use App\Http\Requests\Entity\UnitFormRequest;

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
    public function index()
    {
        $units = $this->unit->whereClientId(Auth::user()->client_id)->orderBy('name')->get();

        return view('entity.units.index', compact('units'));
    }

    /**
     *crear unidad
	 *
	 *return Response
    */
    public function create()
    {
        $employees = Employee::whereClientId(Auth::user()->client_id)->orderBy('name')->lists('name', 'id');
        $managements = Management::whereClientId(Auth::user()->client_id)->orderBy('name')->lists('name', 'id');

        return view('entity.units.create', compact('employees', 'managements'));
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
    public function store(UnitFormRequest $request){
        $data = $request->except('_token');

        $unit = $this->unit->create($data);

        return redirect()->action('Entity\UnitController@index');
    }
}
