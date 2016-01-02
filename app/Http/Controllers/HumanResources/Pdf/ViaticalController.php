<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF, Carbon\Carbon;

use App\Models\HumanResources\Viatical;
use App\Models\Admin\Client;
use App\Models\Entity\Employee;

use App\Models\Admin\PdfFormat;

class ViaticalController extends Controller
{
    protected $viatical;
    protected $employee;
    protected $client;
	protected $formatId = 7;

    public function __construct(Viatical $viatical, Employee $employee, Client $client)
    {
        $this->viatical = $viatical;
        $this->employee = $employee;
        $this->client = $client;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($viaticalId)
    {
        $viatical = $this->viatical->findOrFail($viaticalId);
        $employee = $this->employee->findOrFail($viatical->employee_id);
        $client = $this->client->findOrFail($employee->client_id);

        $dataSearch = [
            'fecha',
            'employee->name',
            'employee->rut',
            'client->social_reason',
            'client->rut',
            'viatical->ammount',
            'viatical->description',            
        ];

        $dataReplace = [
            Carbon::parse($viatical->date)->format('d/m/Y'),
            $employee->name,
            $employee->rut,
            $client->social_reason,
            $client->rut,
            $viatical->ammount,
            $viatical->description,
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

