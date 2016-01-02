<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF, Carbon\Carbon;

use App\Models\Admin\Client;
use App\Models\Entity\Employee;
use App\Models\HumanResources\Bond;

use App\Models\Admin\PdfFormat;

class BondController extends Controller
{
    protected $bond;
    protected $employee;
    protected $client;
	protected $formatId = 3;

    public function __construct(Bond $bond, Employee $employee, Client $client)
    {
        $this->bond = $bond;
        $this->employee = $employee;
        $this->client = $client;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($bondId)
    {
        $bond = $this->bond->findOrFail($bondId);
        $employee = $this->employee->findOrFail($bond->employee_id);
        $client = $this->client->findOrFail($employee->client_id);

        $dataSearch = [
        	'fecha',
        	'employee->name',
        	'employee->rut',
        	'client->social_reason',
        	'client->rut',
        	'bond->ammount',
        	'bond->description',        	
        ];

        $dataReplace = [
        	Carbon::parse($bond->date)->format('d/m/Y'),
        	$employee->name,
        	$employee->rut,
        	$client->social_reason,
        	$client->rut,
        	$bond->ammount,
        	$bond->description,
        ];

        $content = str_replace('$', '', $this->pdfFormat->content);
        $content = str_replace($dataSearch, $dataReplace, $content);

        $pdf = PDF::loadView('humanresources.pdf.generals',
        	[
        		'format' => $this->pdfFormat,
        		'content' => $content,
           	]
        );

        return $pdf->stream();
    }    
}
