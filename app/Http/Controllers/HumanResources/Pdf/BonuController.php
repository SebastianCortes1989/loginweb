<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF, Carbon\Carbon;

use App\Models\HumanResources\Bonus;
use App\Models\Admin\Client;
use App\Models\Entity\Employee;

use App\Models\Admin\PdfFormat;

class BonuController extends Controller
{
    protected $bonus;
    protected $employee;
    protected $client;
	protected $formatId = 2;

    public function __construct(Bonus $bonus, Employee $employee, Client $client)
    {
        $this->bonus = $bonus;
        $this->employee = $employee;
        $this->client = $client;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($bonuId)
    {
    	$bonus = $this->bonus->findOrFail($bonuId);
        $employee = $this->employee->findOrFail($bonus->employee_id);
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
            Carbon::parse($bonus->date)->format('d/m/Y'),
            $employee->name,
            $employee->rut,
            $client->social_reason,
            $client->rut,
            $bonus->ammount,
            $bonus->description,
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
