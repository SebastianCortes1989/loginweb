<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;

use App\Models\HumanResources\Discount;

use App\Http\Requests\HumanResources\DiscountFormRequest;

class DiscountController extends Controller
{
    protected $discount;

    public function __construct(Discount $discount){
        $this->discount = $discount;
    }

    /**
     * listar descuentos por empresa
	 *
	 * @return Response
    */
    public function index()
    {
        $discounts = $this->discount->whereClientId(Auth::user()->client_id)->get();

        return view('humanresources.discounts.index', compact('discounts'));
    }

    /**
     * crear descuento
	 *
	 * @return Response
    */
    public function create()
    {
        $employees = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')->get()
                    ->lists('employee.name', 'employee.id');

        return view('humanresources.discounts.create', compact('employees'));
    }

    /**
     * editar descuento
	 *
	 * @return Response
    */
    public function edit($discutionId)
    {
        return view('humanresources.discounts.edit');
    }

    /**
     * registrar descuento
     *
     * @return Response
    */
    public function store(DiscountFormRequest $request)
    {
        $data = $request->except('_token');

        $contract = Contract::whereEmployeeId($data['employee_id'])->first();
        $data['contract_id'] = $contract->id;
        
        $discount = $this->discount->create($data);

        return redirect()->action('HumanResources\DiscountController@index');
    }
}
