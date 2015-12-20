<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\ExtraHour;

class ExtraHourController extends Controller
{
    public function view($apvId)
    {
        $pdf = PDF::loadView('humanresources.pdf.extrahours', []);

        return $pdf->stream();
    }    
}
