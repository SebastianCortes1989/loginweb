<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;

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
        return view('entity.employees.create');
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
