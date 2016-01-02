<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF;

use App\Models\Entity\Employee;

use App\Models\HumanResources\Bond;

use App\Models\Admin\PdfFormat;

class BondController extends Controller
{
    protected $bond;
    protected $employee;
	protected $formatId = 3;

    public function __construct(Bond $bond, Employee $employee)
    {
        $this->bond = $bond;
        $this->employee = $employee;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($bondId)
    {
        $bond = $this->bond->findOrFail($bondId);
        $trabajador = $this->employee->findOrFail($bond->employee_id);

        $pdf = PDF::loadView('humanresources.pdf.bonds', 
        	[
        		'bond' => $bond,
        		'trabajador' => $trabajador,
        		'format' => $this->pdfFormat,
        		'content' => $this->pdfFormat->content,
           	]
        );

        return $pdf->stream();
    }    
}
