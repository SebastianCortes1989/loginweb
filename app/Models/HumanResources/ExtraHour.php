<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class ExtraHour extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_extra_hours';
    protected $fillable = ['client_id', 'employee_id', 'start_date', 'end_date', 'percentaje_id', 'description', 'contract_id'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }    
}
