<?php

namespace App\Models\HumanResources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{    
    protected $table = 'rrhh_discounts';
    protected $fillable = ['client_id', 'employee_id', 'ammount', 'date', 'quotas', 'description', 'contract_id'];
    protected $dates = ['date'];
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
        return 'DES-'.$this->client_id.'-'.$this->id;
    }

    //mutators
    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['date'] = $date->format('Y-m-d');
    }

    //scopes
    public function scopeMonth($query, $month)
    {
        return $query->where('date', 'like', '%-'.$month.'-%');
    }

    public function scopeYear($query, $year)
    {
        return $query->where('date', 'like', $year.'-%-%');
    }
}
