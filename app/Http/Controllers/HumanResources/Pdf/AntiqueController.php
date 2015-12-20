<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF;

use App\Models\Admin\Client;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Antique;

class AntiqueController extends Controller
{
    public function view($antiqueId)
    {
        $pdf = PDF::loadView('humanresources.pdf.antiques', []);

        return $pdf->stream();
    }    
}
