<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Antique extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_antiques';
    protected $fillable = ['client_id', 'employee_id', 'date'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 
}
