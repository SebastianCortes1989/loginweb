<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
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

class EmployeeController extends Controller
{
    
    /*
     *listar trabajadores por empresa
     *
     *return Response
    */
    public function index($clientId = null)
    {
        return view('entity.employees.index');
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

        return view('entity.employees.create', compact('nacionalities', 'cities', 'communes', 'afc', 'afp', 'apv', 'banks', 'familyCharges', 'employeeTypes', 'accountTypes', 'healths'));
    }

    /*
     *editar trabajador
     *
     *return Response
    */
    public function edit($employeeId)
    {
        return view('entity.employees.edit');
    }
}
