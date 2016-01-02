<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF, Carbon\Carbon;

use App\Models\HumanResources\Tool;
use App\Models\Admin\Client;
use App\Models\Entity\Employee;

use App\Models\Admin\PdfFormat;

class ToolController extends Controller
{
    protected $tool;
    protected $employee;
    protected $client;
	protected $formatId = 4;

    public function __construct(Tool $tool, Employee $employee, Client $client)
    {
        $this->tool = $tool;
        $this->employee = $employee;
        $this->client = $client;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($toolId)
    {
        $tool = $this->tool->findOrFail($toolId);
        $employee = $this->employee->findOrFail($tool->employee_id);
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
            Carbon::parse($tool->date)->format('d/m/Y'),
            $employee->name,
            $employee->rut,
            $client->social_reason,
            $client->rut,
            $tool->ammount,
            $tool->description,
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
