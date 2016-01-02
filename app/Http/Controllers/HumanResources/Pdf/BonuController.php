<?php

namespace App\Http\Controllers\HumanResources\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth, \PDF;

use App\Models\HumanResources\Bonus;

use App\Models\Admin\PdfFormat;

class BonuController extends Controller
{
    protected $bonus;
	protected $formatId = 2;

    public function __construct(Bonus $bonus)
    {
        $this->bonus = $bonus;
        $this->pdfFormat = PdfFormat::findOrFail($this->formatId);
    }

    public function view($bonuId)
    {
    	$bonus = $this->bonus->findOrFail($bonuId);

        $pdf = PDF::loadView('humanresources.pdf.bonus', 
        	[
        		'bonus' => $bonus,
        		'format' => $this->pdfFormat,
        	]
        );

        return $pdf->stream();
    }    
}
