<?php

namespace App\Http\Controllers\HumanResources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \Auth;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;
use App\Models\HumanResources\Contract;

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
    public function index(Request $request)
    {    
        $year = $request->get('year', date('Y'));
        $month = $request->get('month', date('m'));

        $contracts = Contract::whereClientId(Auth::user()->client_id)
                    ->with('employee')
                    ->get();

        return view('humanresources.remunerations.index', compact('contracts', 'year', 'month'));
    }
}
