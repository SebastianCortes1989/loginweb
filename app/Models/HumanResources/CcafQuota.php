<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class CcafQuota extends Model
{    
    protected $table = 'rrhh_ccaf_quotas';
    protected $fillable = ['number', 'ccaf_id', 'contract_id', 'employee_id', 'month', 'year', 'ammount'];

    /*
     * relaciones
    */
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
}
