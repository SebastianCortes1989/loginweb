<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF, Carbon\Carbon;

use App\Models\HumanResources\Antique;
use App\Models\Admin\Client;
use App\Models\Entity\Employee;

use App\Models\Admin\PdfFormat;

class AntiqueController extends Controller
{
    protected $antique;
    protected $employee;
    protected $client;
	protected $formatId = 10;

    public function __construct(Antique $antique, Employee $employee, Client $client)
    {
        $this->antique = $antique;
        $this->employee = $employee;
        $this->client = $client;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($antiqueId)
    {
        $antique = $this->antique->findOrFail($antiqueId);
        $employee = $this->employee->findOrFail($antique->employee_id);
        $client = $this->client->findOrFail($employee->client_id);

        $dataSearch = [
            'antique->date',
            'employee->name',
            'employee->rut',
            'client->social_reason',
            'client->rut',
            'antique->ammount',
            'antique->description',            
        ];

        $dataReplace = [
            Carbon::parse($antique->date)->format('d/m/Y'),
            $employee->name,
            $employee->rut,
            $client->social_reason,
            $client->rut,
            $antique->ammount,
            $antique->description,
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
