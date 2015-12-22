<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_settlements';
    protected $fillable = ['client_id', 'employee_id', 'date', 'causal_id', 'proportional_holidays', 'substitute_compensation', 'service_years', 'substitute_voluntary', 'substitute_agreed', 'legal_holidays', 'afc', 'compensacion_loans', 'petty_cash', 'discounts_others', 'severals', 'contract_id'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 
}
