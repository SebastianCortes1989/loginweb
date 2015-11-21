<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_transfers';
    protected $fillable = ['client_id', 'employee_id', 'start_date', 'end_date', 'cause_id', 'from_branch_id', 'to_branch_id'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 
}
