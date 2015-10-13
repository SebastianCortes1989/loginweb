<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /*
     *mantenedor de trabajadores
    */

    public function index($clientId = null)
    {
        return view('entity.employees.index');
    }

    public function create()
    {
        return view('entity.employees.create');
    }

    public function edit($employeeId)
    {
        return view('entity.employees.edit');
    }
}
