<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\City;
use App\Models\Admin\Commune;
use App\Models\Admin\Nacionality;
use App\Models\Admin\Afc;
use App\Models\Admin\Apv;
use App\Models\Admin\Afp;
use App\Models\Admin\Bank;
use App\Models\Admin\FamilyCharge;
use App\Models\Admin\Health;
use App\Models\Admin\EmployeeType;
use App\Models\Admin\AccountType;
use App\Models\Admin\Client;

use App\Models\Entity\Employee;

class EmployeeController extends Controller
{
    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }


    /*
     *listar trabajadores por empresa
     *
     *return Response
    */
    public function index($clientId = null)
    {
        $employees = $this->employee->orderBy('name')->get();

        return view('entity.employees.index', compact('employees'));
    }

    /*
     *crear trabajador
     *
     *return Response
    */
    public function create()
    {
        $nacionalities = Nacionality::lists('name', 'id');
        $cities = City::lists('name', 'id');
        $communes = Commune::lists('name', 'id');
        $afc = Afc::lists('name', 'id');
        $afp = Afp::lists('name', 'id');
        $apv = Apv::lists('name', 'id');
        $banks = Bank::lists('name', 'id');
        $familyCharges = FamilyCharge::lists('name', 'id');
        $employeeTypes = EmployeeType::lists('name', 'id');
        $accountTypes = AccountType::lists('name', 'id');
        $healths = Health::lists('name', 'id');

        $clients = Client::orderBy('name')->lists('name', 'id');

        return view('entity.employees.create', compact('nacionalities', 'cities', 'communes', 'afc', 'afp', 'apv', 'banks', 'familyCharges', 'employeeTypes', 'accountTypes', 'healths', 'clients'));
    }

    /*
     * editar trabajador
     *
     * return Response
    */
    public function edit($employeeId)
    {
        return view('entity.employees.edit');
    }

    /*
     * registrar trabajador
     *
     * return Response
    */
    public function store(Request $request){
        $data = $request->except('_token');
        $data['family_charge_id'] = $request->get('family_charge');
        $data['invalids'] = $request->get('invalidates');

        $employee = $this->employee->create($data);

        return redirect()->action('Entity\EmployeeController@index');
    }

}
