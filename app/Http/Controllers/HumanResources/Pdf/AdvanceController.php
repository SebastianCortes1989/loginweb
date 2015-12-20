<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Advance;

class AdvanceController extends Controller
{
    public function view($advanceId)
    {
        $pdf = PDF::loadView('humanresources.pdf.advances', []);

        return $pdf->stream();
    }    
}
