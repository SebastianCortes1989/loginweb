<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Ccaf extends Model
{    
    protected $table = 'rrhh_ccaf';
    protected $fillable = ['client_id', 'employee_id', 'compensacion_id', 'month', 'year', 'type_id', 'quotas', 'ammount', 'contract_id'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    public function compensacion()
    {
        return $this->belongsTo('App\Models\Admin\Compensacion', 'compensacion_id');
    }

    // funciones
    public function code()
    {
        return 'CCAF-'.$this->client_id.'-'.$this->id;
    }

    public function createQuotas()
    {
        $month = $this->month;
        $year = $this->year;
        for ($i=1; $i <= $this->quotas; $i++)
        {
            $quota = new CcafQuota;

            $ammount = $quota->generateAmmount($this->ammount, $this->quotas);
            $year = $month == 12 ? $year+1 : $year;
            $month = $month == 12 ? 1 : $month+1;

            $quota->contract_id = $this->contract_id;
            $quota->employee_id = $this->employee_id;
            $quota->ccaf_id     = $this->id;
            $quota->number      = $i;
            $quota->ammount     = $ammount;
            $quota->month       = $month;
            $quota->year        = $year;
            $quota->save();
        }
    }
}
