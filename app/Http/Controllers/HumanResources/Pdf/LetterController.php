<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF, Carbon\Carbon;

use App\Models\HumanResources\Letter;
use App\Models\Admin\Client;
use App\Models\Entity\Employee;

use App\Models\Admin\PdfFormat;

class LetterController extends Controller
{
    protected $advance;
    protected $employee;
    protected $client;
	protected $formatId = 9;

    public function __construct(Letter $letter, Employee $employee, Client $client)
    {
        $this->letter = $letter;
        $this->employee = $employee;
        $this->client = $client;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($letterId)
    {
        $letter = $this->letter->findOrFail($letterId);
        $employee = $this->employee->findOrFail($letter->employee_id);
        $client = $this->client->findOrFail($employee->client_id);

        $dataSearch = [
            'date',
            'employee->name',
            'employee->rut',
            'client->social_reason',
            'client->rut',
            'letter->fact',
        ];

        $dataReplace = [
            Carbon::now()->format('d/m/Y'),
            $employee->name,
            $employee->rut,
            $client->social_reason,
            $client->rut,
            $letter->fact,
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
