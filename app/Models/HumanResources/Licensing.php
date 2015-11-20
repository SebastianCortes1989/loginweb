<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Licensing extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_licensings';
    protected $fillable = ['client_id', 'employee_id', 'start_date', 'end_date', 'ammount', 'work_accident'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 
}
