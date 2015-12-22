<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_loans';
    protected $fillable = ['client_id', 'employee_id', 'day', 'month', 'year', 'type_id', 'quotas', 'ammount', 'contract_id'];
    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 
}
