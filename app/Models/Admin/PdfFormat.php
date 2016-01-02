<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PdfFormat extends Model
{    
    protected $table = 'general_pdf_formats';
    protected $fillable = ['name', 'content'];
}
