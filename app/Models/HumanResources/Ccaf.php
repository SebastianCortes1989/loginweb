<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Ccaf extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_ccaf';
    protected $fillable = ['client_id', 'employee_id', 'compensacion_id', 'month', 'year', 'type_id', 'quotas', 'ammount'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 
}
