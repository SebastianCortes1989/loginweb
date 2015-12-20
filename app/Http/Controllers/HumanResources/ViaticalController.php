<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;
use App\Models\HumanResources\ViaticalType;

use App\Models\HumanResources\Viatical;

use App\Http\Requests\HumanResources\ViaticalFormRequest;

class ViaticalController extends Controller
{
    protected $viatical;

    public function __construct(Viatical $viatical){
        $this->viatical = $viatical;
    }

    /**
     *listar viaticos por empresa
	 *
	 *return Response
    */
    public function index()
    {
        $viaticals = $this->viatical->whereClientId(Auth::user()->client_id)->orderBy('date')->get();
        
        return view('humanresources.viaticals.index', compact('viaticals'));
    }

    /**
     *crear viatico
	 *
	 *return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        $viaticalsTypes = ViaticalType::orderBy('name')->lists('name', 'id');

        return view('humanresources.viaticals.create', compact('employees', 'viaticalsTypes'));
    }

    /**
     *registrar viatico
     *
     *return Response
    */
    public function store(ViaticalFormRequest $request){
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $viaticals = $this->viatical->create($data);

        return redirect()->action('HumanResources\ViaticalController@index');
    }

    /**
     *editar viatico
	 *
	 *return Response
    */
    public function edit($viaticalId)
    {
        return view('humanresources.viaticals.edit');
    }
}
