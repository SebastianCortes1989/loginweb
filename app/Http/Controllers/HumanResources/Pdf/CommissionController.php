<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF, Carbon\Carbon;

use App\Models\HumanResources\Commission;
use App\Models\Admin\Client;
use App\Models\Entity\Employee;

use App\Models\Admin\PdfFormat;

class CommissionController extends Controller
{
    protected $commission;
    protected $employee;
    protected $client;
	protected $formatId = 5;

    public function __construct(Commission $commission, Employee $employee, Client $client)
    {
        $this->commission = $commission;
        $this->employee = $employee;
        $this->client = $client;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($commissionId)
    {
        $commission = $this->commission->findOrFail($commissionId);
        $employee = $this->employee->findOrFail($commission->employee_id);
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
            Carbon::parse($commission->date)->format('d/m/Y'),
            $employee->name,
            $employee->rut,
            $client->social_reason,
            $client->rut,
            $commission->ammount,
            $commission->description,
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

