<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Viatical;

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
    public function index($clientId = null)
    {
        $viaticals = $this->viatical->orderBy('date')->get();
        
        return view('humanresources.viaticals.index', compact('viaticals'));
    }

    /**
     *crear viatico
	 *
	 *return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.viaticals.create', compact('clients', 'employees'));
    }

    /**
     *registrar viatico
     *
     *return Response
    */
    public function store(Request $request){
        $data = $request->except('_token');

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
