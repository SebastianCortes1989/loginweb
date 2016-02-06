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
use App\Http\Requests\HumanResources\DiscountEditFormRequest;

class DiscountController extends Controller
{
    protected $discount;
    protected $employee;

    public function __construct(Discount $discount, Employee $employee)
    {
        $this->discount = $discount;
        $this->employee = $employee;
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
        $employees = $this->employee->getCmb();          

        return view('humanresources.discounts.create', compact('employees'));
    }

    /**
     * editar descuento
	 *
	 * @return Response
    */
    public function edit($discountId)
    {
        $discount = $this->discount->findOrFail($discountId);

        $employees = $this->employee->getCmb();

        return view('humanresources.discounts.edit', compact('discount', 'employees'));
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

    /**
     * modificar descuento
     *
     * @return Response
    */
    public function update(DiscountEditFormRequest $request)
    {
        $data = $request->except('_token');

        $discount = $this->discount->findOrFail($data['discount_id']);
        $discount = $discount->update($data);

        return redirect()->action('HumanResources\DiscountController@index');
    }
}
