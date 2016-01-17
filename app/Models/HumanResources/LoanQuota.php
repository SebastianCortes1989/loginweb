<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LoanQuota extends Model
{
    protected $table = 'rrhh_loans_quotas';
    protected $fillable = ['number', 'loan_id', 'contract_id', 'employee_id', 'date', 'ammount'];
    
    // relaciones
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 

    // funciones
    public function generateAmmount($total, $quotas)
    {
        $ammount = $total/$quotas;
        $ammount = round($ammount, 2);
        
        return $ammount;
    }

    public function generateDate($day, $month, $year, $number)
    {
        $date = Carbon::createFromDate($year, $month, $day);
        $date = $date->addMonths($number);

        return $date;
    }

    //scopes
    public function scopeMonth($query, $month)
    {
        return $query->where('date', 'like', '%-'.$month.'-%');
    }

    public function scopeYear($query, $year)
    {
        return $query->where('date', 'like', '%-%-'.$year);
    }
}
