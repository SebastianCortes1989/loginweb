<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF, Carbon\Carbon;

use App\Models\HumanResources\Advance;
use App\Models\Admin\Client;
use App\Models\Entity\Employee;

use App\Models\Admin\PdfFormat;

class AdvanceController extends Controller
{
    protected $advance;
    protected $employee;
    protected $client;
	protected $formatId = 8;

    public function __construct(Advance $advance, Employee $employee, Client $client)
    {
        $this->advance = $advance;
        $this->employee = $employee;
        $this->client = $client;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($advanceId)
    {
        $advance = $this->advance->findOrFail($advanceId);
        $employee = $this->employee->findOrFail($advance->employee_id);
        $client = $this->client->findOrFail($employee->client_id);

        $dataSearch = [
            'fecha',
            'employee->name',
            'employee->rut',
            'client->social_reason',
            'client->rut',
            'advance->ammount',
            'advance->description',            
        ];

        $dataReplace = [
            Carbon::parse($advance->date)->format('d/m/Y'),
            $employee->name,
            $employee->rut,
            $client->social_reason,
            $client->rut,
            $advance->ammount,
            $advance->description,
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
