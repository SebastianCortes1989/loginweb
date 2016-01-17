<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{
    protected $table = 'rrhh_loans_types';
    protected $fillable = ['name'];    
}
