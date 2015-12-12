<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Advance;

//use App\Http\Requests\HumanResources\AdvanceFormRequest;

class RemunerationController extends Controller
{
    protected $remuneration;

    /*public function __construct(Advance $advance){
        $this->advance = $advance;
    }*/

    /**
     * listar anticipos por empresa
	 *
	 * @return Response
    */
    public function index()
    {    
        return view('humanresources.remunerations.index');
    }
}
