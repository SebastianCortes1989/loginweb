<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF;

use App\Models\HumanResources\Contract;

use App\Models\Admin\PdfFormat;

class ContractController extends Controller
{
	protected $contract;
	protected $formatId = 1;

    public function __construct(Contract $contract)
    {
        $this->contract = $contract;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($contractId)
    {
    	$contract = $this->contract->findOrFail($contractId);

        $pdf = PDF::loadView('humanresources.pdf.contracts', 
        	[
        		'contract' => $contract, 
        		'format' => $this->pdfFormat,
        	]
        );

        return $pdf->stream();
    }    
}
