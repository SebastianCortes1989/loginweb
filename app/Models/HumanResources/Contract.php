<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_contracts';
    protected $fillable = ['client_id', 'employee_id', 'branch_id', 'charge_id', 'contract_type_id', 'working_type', 'start_date', 'end_date'];

    /*
     * relaciones
   	*/
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    public function contractType()
    {
        return $this->belongsTo('App\Models\Admin\ContractType', 'contract_type_id');
    }

    public function charge()
    {
        return $this->belongsTo('App\Models\Entity\Charge', 'charge_id');
    }
}
