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
use App\Http\Requests\HumanResources\ViaticalEditFormRequest;

class ViaticalController extends Controller
{
    protected $viatical;
    protected $employee;

    public function __construct(Viatical $viatical, Employee $employee)
    {
        $this->viatical = $viatical;
        $this->employee = $employee;

        $this->middleware('contracts', ['only' => [
            'create',
        ]]);
    }

    /**
     * listar viaticos por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $viaticals = $this->viatical->whereClientId(Auth::user()->client_id)->orderBy('date')->get();
        
        return view('humanresources.viaticals.index', compact('viaticals'));
    }

    /**
     * crear viatico
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = $this->employee->getCmb();
        $viaticalsTypes = ViaticalType::orderBy('name')->lists('name', 'id');

        return view('humanresources.viaticals.create', compact('employees', 'viaticalsTypes'));
    }

    /**
     * registrar viatico
     *
     * @return Response
    */
    public function store(ViaticalFormRequest $request){
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $viatical = $this->viatical->create($data);

        return redirect()->action('HumanResources\ViaticalController@index');
    }

    /**
     * editar viatico
	 *
	 * @return Response
    */
    public function edit($viaticalId)
    {
        $viatical = $this->viatical->findOrFail($viaticalId);

        $employees = $this->employee->getCmb();
        $viaticalsTypes = ViaticalType::orderBy('name')->lists('name', 'id');

        return view('humanresources.viaticals.edit', compact('viatical', 'employees', 'viaticalsTypes'));
    }

    /**
     * modificar viatico
     *
     * @return Response
    */
    public function update(ViaticalEditFormRequest $request){
        $data = $request->except('_token');
        
        $viatical = $this->viatical->findOrFail($data['viatical_id']);
        $viatical = $viatical->update($data);

        return redirect()->action('HumanResources\ViaticalController@index');
    }
}
