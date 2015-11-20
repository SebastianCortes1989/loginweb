<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_advances';
    protected $fillable = ['client_id', 'employee_id', 'ammount', 'date', 'type_id', 'description'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 
}
