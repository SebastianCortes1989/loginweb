<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $table = 'rrhh_savings';
    protected $fillable = ['client_id', 'employee_id', 'ammount', 'date', 'type_id', 'description', 'contract_id'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    //functions
    public function code()
    {
        return 'APV-'.$this->client_id.'-'.$this->id;
    }

    //scopes
    public function scopeMonth($query, $month)
    {
        return $query->where('created_at', 'like', '%-'.$month.'-%');
    }

    public function scopeYear($query, $year)
    {
        return $query->where('created_at', 'like', $year.'-%-%');
    }
}
