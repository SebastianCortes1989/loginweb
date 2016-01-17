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
	protected $extraHour;
    protected $employee;
    protected $client;

    public function __construct(ExtraHour $extraHour, Employee $employee, Client $client)
    {
        $this->extraHour = $extraHour;
        $this->employee = $employee;
        $this->client = $client;
    }

    public function view($extraHourId)
    {
    	$extraHour = $this->extraHour->findOrFail($extraHourId);
        $employee = $this->employee->findOrFail($extraHour->employee_id);
        $client = $this->client->findOrFail($employee->client_id);

        $pdf = PDF::loadView('humanresources.pdf.extrahours',
            [
                'client'   => $client,
                'employee' => $employee
            ]
        );

        return $pdf->stream();
    }    
}
