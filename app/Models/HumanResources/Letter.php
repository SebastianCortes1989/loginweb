<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rrhh_letters';
    protected $fillable = ['client_id', 'employee_id', 'causal_id', 'certification', 'notice_date', 'settlement_date', 'fact'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    } 
}
