<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\PdfFormat;

use Carbon\Carbon, \Auth;

class PdfController extends Controller
{
    protected $pdfFormat;

    public function __construct(PdfFormat $pdfFormat)
    {
        $this->pdfFormat = $pdfFormat;
    }

    /**
     *listar formatos
     *
     *@return Response
    */
    public function index()
    {
        $pdfFormats = $this->pdfFormat->orderBy('name')->get();

        return view('admin.pdf.index', compact('pdfFormats'));
    }

    /**
     *crear formato
     *
     *@return Response
    */
    public function create()
    {
        return view('admin.pdf.create');
    }

    /**
    * guardar formato en pdf
    *
    * @return Response
    */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $pdfFormat = $this->pdfFormat->create($data);

        return redirect()->action('Admin\PdfController@index');
    }

    /**
     *editar formato
     *
     *@return Response
    */
    public function edit($pdfFormatId)
    {
    }

}
