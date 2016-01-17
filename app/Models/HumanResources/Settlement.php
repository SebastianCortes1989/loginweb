<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Settlement extends Model
{
    protected $table = 'rrhh_settlements';
    protected $fillable = ['client_id', 'employee_id', 'date', 'letter_id', 'causal_id', 
    'proportional_holidays', 'substitute_compensation', 'service_years', 'substitute_voluntary', 
    'substitute_agreed', 'legal_holidays', 'afc', 'compensacion_loans', 'petty_cash', 
    'discounts_others', 'severals', 'contract_id', 'letter_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'date'];

    /*
     * relaciones
    */
    public function employee()
    {
        return $this->belongsTo('App\Models\Entity\Employee', 'employee_id');
    }

    public function causal()
    {
        return $this->belongsTo('App\Models\Admin\Causal', 'causal_id');
    }

    public function letter()
    {
        return $this->belongsTo('App\Models\HumanResources\Letter', 'letter_id');
    }

    // mutators
    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['date'] = $date->format('Y-m-d');
    }

    // funciones
    public function code()
    {
        return 'FIN-'.$this->client_id.'-'.$this->id;
    }
}
