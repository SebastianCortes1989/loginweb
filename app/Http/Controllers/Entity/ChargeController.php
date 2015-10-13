<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;

class ChargeController extends Controller
{
    /*
     *mantenedor de cargos
    */

    public function index($clientId = null)
    {
        return view('entity.charges.index');
    }

    public function create()
    {
        return view('entity.charges.create');
    }

    public function edit($chargeId)
    {
        return view('entity.charges.edit');
    }
}
