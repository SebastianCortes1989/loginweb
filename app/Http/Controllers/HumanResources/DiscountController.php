<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

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
    public function index($clientId = null)
    {
        $discounts = $this->discount->all();

        return view('humanresources.discounts.index', compact('discounts'));
    }

    /**
     * crear descuento
	 *
	 * @return Response
    */
    public function create()
    {
        $clients = Client::orderBy('name')->lists('name', 'id');
        $employees = Employee::orderBy('name')->lists('name', 'id');

        return view('humanresources.discounts.create', compact('clients', 'employees'));
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

        $discount = $this->discount->create($data);

        return redirect()->action('HumanResources\DiscountController@index');
    }
}
